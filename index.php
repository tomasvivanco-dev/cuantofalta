<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fin del Gobierno de Kast - 11 de marzo 2030</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Merriweather', serif;
      background: linear-gradient(135deg, #0039A6 0%, #002D7F 100%); /* Azul marino bandera Chile */
      color: #FFFFFF;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      text-align: center;
      padding: 2rem;
      line-height: 1.4;
    }
    h1 {
      font-size: clamp(2rem, 5vw, 3.5rem);
      font-weight: 700;
      margin-bottom: 1rem;
      text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }
    .subtitle {
      font-size: clamp(1rem, 3vw, 1.5rem);
      font-weight: 300;
      margin-bottom: 3rem;
      opacity: 0.9;
    }
    .countdown {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
      justify-content: center;
      font-size: clamp(1.5rem, 4vw, 2.5rem);
      max-width: 600px;
    }
    .unit {
      background: rgba(255,255,255,0.1);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255,255,255,0.2);
      padding: 1.5rem 1rem;
      border-radius: 1rem;
      min-width: 120px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.3);
    }
    .number {
      font-size: 2em;
      font-weight: 700;
      display: block;
      text-shadow: 0 2px 4px rgba(0,0,0,0.5);
    }
    .label {
      font-size: 0.8em;
      font-weight: 300;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      opacity: 0.8;
      margin-top: 0.25rem;
    }
    .expired {
      font-size: clamp(1.5rem, 4vw, 2.5rem);
      margin-top: 2rem;
      color: #FF6B35;
      font-weight: 400;
      animation: pulse 2s infinite;
    }
    @keyframes pulse {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.7; }
    }
    @media (max-width: 480px) {
      .countdown { gap: 1rem; }
      .unit { min-width: 90px; padding: 1rem 0.5rem; }
    }
  </style>
</head>
<body>
  <h1>Fin del Gobierno de Kast</h1>
  <p class="subtitle">Cuánto falta para el 11 de marzo de 2030</p>

  <div id="countdown" class="countdown">
    <div class="unit">
      <span id="days" class="number">0</span>
      <span class="label">Días</span>
    </div>
    <div class="unit">
      <span id="hours" class="number">00</span>
      <span class="label">Horas</span>
    </div>
    <div class="unit">
      <span id="minutes" class="number">00</span>
      <span class="label">Minutos</span>
    </div>
    <div class="unit">
      <span id="seconds" class="number">00</span>
      <span class="label">Segundos</span>
    </div>
  </div>

  <div id="expired" class="expired" style="display:none;">
    ¡El mandato ha finalizado!
  </div>

  <script>
    // Fecha fin mandato: 11 de marzo de 2030 a las 00:00:00 (hora local Chile)
    const targetDate = new Date("2030-03-11T00:00:00");

    const daysEl = document.getElementById("days");
    const hoursEl = document.getElementById("hours");
    const minutesEl = document.getElementById("minutes");
    const secondsEl = document.getElementById("seconds");
    const countdownEl = document.getElementById("countdown");
    const expiredEl = document.getElementById("expired");

    function updateCountdown() {
      const now = new Date();
      const diff = targetDate.getTime() - now.getTime();

      if (diff <= 0) {
        countdownEl.style.display = "none";
        expiredEl.style.display = "block";
        clearInterval(intervalId);
        return;
      }

      const totalSeconds = Math.floor(diff / 1000);
      const days = Math.floor(totalSeconds / (60 * 60 * 24));
      const hours = Math.floor((totalSeconds % (60 * 60 * 24)) / (60 * 60));
      const minutes = Math.floor((totalSeconds % (60 * 60)) / 60);
      const seconds = totalSeconds % 60;

      daysEl.textContent = days;
      hoursEl.textContent = hours.toString().padStart(2, "0");
      minutesEl.textContent = minutes.toString().padStart(2, "0");
      secondsEl.textContent = seconds.toString().padStart(2, "0");
    }

    const intervalId = setInterval(updateCountdown, 1000);
    updateCountdown(); // Primera actualización inmediata
  </script>
</body>
</html>
