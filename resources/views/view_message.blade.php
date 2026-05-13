<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Legislative Assembly - Sin Sesión Activa</title>
    <!-- Fonts and Icons -->
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600;700&amp;family=Inter:wght@400;500;600&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link href="{{ asset('css/style_message.css') }}" rel="stylesheet" />

</head>

<body>
    <main>
        <div class="container">
            <!-- Illustration Section -->
            <div class="illustration-container">
                <div class="image-wrapper">
                    <img alt="No hay sesión activa"
                        src="https://lh3.googleusercontent.com/aida/ADBb0ui9Zm7UhKELPgQOPBdyDg_ejPPDrOIftGsOqQzzMhMvs2wjj7R1huBkvAd8IB0C224txZAkQs42tnWATRqr4Qb5aqfGP6EwQIroVr04UsXRIJpvtJ-FeitM3zs1XT2dDlNuO_DTf1mPkYpRsPlozXAzqqUY7P4pWXXfp-OPeINrimUq3EzyqneINo5niw3IqR4zZpuFY9giqDxNm51xFbsNKepq15gbnrgUbHENazyFVl9nyZFmhQG2Eg" />
                </div>
            </div>
            <!-- Status Message Section -->
            <div class="content-container">
                <div class="status-badge">
                    <span class="material-symbols-outlined">event_busy</span>
                    <span>Estado del Sistema</span>
                </div>
                <h1 class="headline">
                    No se encuentra ninguna sesión activa, favor de verificar
                </h1>
                <p class="body-text">
                    El sistema de votación electrónica se encuentra actualmente en modo de espera. Por favor, asegúrese
                    de que la sesión legislativa haya sido debidamente convocada por la mesa directiva antes de intentar
                    acceder.
                </p>
                <div class="button-group">
                    <button class="btn-refresh" onclick="window.location.reload()">
                        <span class="material-symbols-outlined">refresh</span>
                        Actualizar Página
                    </button>
                </div>
                <div class="admin-note">
                    <span class="material-symbols-outlined">info</span>
                    <div class="admin-note-content">
                        <p>Nota</p>
                        <p>La ultima sesion registrada es <b>"{{ $sesion->descripcion }}"</b> </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>