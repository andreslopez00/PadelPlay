<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use TCPDF; // Importamos TCPDF para generar el PDF

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $orderDetails;

    /**
     * Constructor - Recibe los detalles del pedido
     */
    public function __construct($orderDetails)
    {
        $this->orderDetails = $orderDetails;
    }

    /**
     * Construye el correo con la factura en PDF
     */
    public function build()
    {
        // Inicializar TCPDF
        $pdf = new TCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('PadelPlay');
        $pdf->SetTitle('Factura de compra - PadelPlay');
        $pdf->SetMargins(10, 10, 10);
        $pdf->AddPage();
        $pdf->SetFont('helvetica', '', 12);

        // **Cálculo del IVA inverso**
        $tipoIVA = 0.21; // 21%
        $subtotal = 0;

        foreach ($this->orderDetails['items'] as $item) {
            $precioConIVA = $item['price']; // El precio ya tiene IVA
            $subtotalSinIVA = $precioConIVA / (1 + $tipoIVA);
            $subtotal += $subtotalSinIVA * $item['quantity'];
        }

        $iva = $subtotal * $tipoIVA;
        $total = $subtotal + $iva; // Total sigue siendo el mismo

        // Generar HTML para la factura
        $html = view('emails.invoice', [
            'orderDetails' => $this->orderDetails,
            'subtotal' => number_format($subtotal, 2),
            'iva' => number_format($iva, 2),
            'total' => number_format($total, 2),
        ])->render();

        // Insertar HTML en el PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        // Adjuntar PDF al email
        return $this->subject('Confirmación de Compra - PadelPlay')
            ->view('emails.order_confirmation')
            ->attachData($pdf->Output('Factura_PadelPlay.pdf', 'S'), "Factura_PadelPlay.pdf", [
                'mime' => 'application/pdf',
            ]);
    }
}
