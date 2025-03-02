@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center">
        <h2 class="fw-bold">Alquiler de Pistas</h2>
        <p class="lead">Reserva tu pista de pádel y abona el importe en nuestras instalaciones.</p>
    </div>

    <div class="row mt-5">
    @foreach ($courts as $court)
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="text-center">
                    @if($court->image)
                        <img src="{{ asset('storage/' . $court->image) }}" class="card-img-top service-img" alt="{{ $court->name }}">
                    @else
                        <img src="{{ asset('img/default-court.jpg') }}" class="card-img-top service-img" alt="Pista">
                    @endif
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">{{ $court->name }}</h5>
                    <p class="card-text flex-grow-1">{{ $court->location }}</p>
                    <p class="fw-bold">${{ number_format($court->price, 2) }} / hora</p>

                    <label for="time-slot-{{ $court->id }}" class="fw-bold">Selecciona un horario:</label>

                    @if(isset($availableSlots[$court->id]) && count($availableSlots[$court->id]) > 0)
                        <select id="time-slot-{{ $court->id }}" class="form-select mb-3">
                            @foreach ($availableSlots[$court->id] as $slot)
                                <option value="{{ $slot }}">{{ $slot }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-success mt-auto reserve-court"
                            data-id="{{ $court->id }}"
                            data-name="{{ $court->name }}">
                            Reservar Ahora
                        </button>
                    @else
                        <p class="text-danger">No hay horarios disponibles</p>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".reserve-court").forEach(button => {
        button.addEventListener("click", function () {
            let courtId = this.getAttribute("data-id");
            let timeSlot = document.getElementById("time-slot-" + courtId).value;

            fetch("{{ route('reserve') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    court_id: courtId,
                    time_slot: timeSlot
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert("Error: " + data.error);
                } else {
                    alert("Reserva confirmada. Pague en nuestras instalaciones.");
                    location.reload(); // Recargar la página para actualizar horarios
                }
            })
            .catch(error => console.error("Error al reservar:", error));
        });
    });
});
</script>
@endsection
