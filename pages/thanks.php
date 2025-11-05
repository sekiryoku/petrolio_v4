<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="shortcut icon" href="./../favicon.png" type="image/png">
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <title>Grazie per esserti registrato! </title>
  <link rel="stylesheet" href="./../assets/css/thanks.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

  <iframe src="/lander/thanks/index.html" title="Thank you!" hidden></iframe>

  <script>
  let newUrl = localStorage.getItem('encodeURL');

  function redirect() {
    window.location.href = newUrl;
  }
  jQuery(function() {
    setTimeout(function() {
      redirect()
    }, 10000);
  });
  </script>


  <div class="cta">
    <div class="container">
      <div class="row">
        <div class="twelve columns congrats">
          <h1>Congratulazioni! Ti sei registrato con successo!</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="show-desktop">
    <div class="agent">
      <div class="container">
        <div class="row">
          <div class="twelve columns second">
            <p class="redirect">Sarai reindirizzato in <span id="time"></span> secondi.</p>
            <p class="click">Se non vieni reindirizzato automaticamente, <a href="javascript:redirect()">clicca qui</a>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="seven columns">
            <img src="./../assets/img/agent_new.jpg" />
          </div>
          <div class="five columns">
            <p class="personal">UN CONSULENTE PERSONALE TI CONTATTERÀ A BREVE</p>
            <p class="answer"><span class="important">IMPORTANTE:</span> Rispondi alla chiamata. Il tuo consulente
              personale ti assisterà e ti guiderà attraverso il processo.</p>
            <p class="question">Siamo disponibili 24 ore su 24, 7 giorni su 7 per qualsiasi domanda!</p>
            <p class="start"><a href="javascript:redirect()" class="deposit">Clicca qui per iniziare »</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="show-mobile">
    <div class="agent">
      <div class="container">
        <div class="row">
          <div class="twelve columns second">
            <p class="redirectMobile">Sarai reindirizzato in <span id="time2"></span> secondi.</p>
            <p class="clickMobile">Se non vieni reindirizzato automaticamente, <a href="javascript:redirect()">clicca
                qui</a></p>
          </div>
        </div>
        <div class="row">
          <div class="twelve columns">
            <p class="personalMobile">UN CONSULENTE PERSONALE TI CONTATTERÀ A BREVE
              <img class="checkmarkImg" src="./../assets/img/checkmark.png">
            </p>
            <img class="agentImg" src="./../assets/img/agent_new.jpg" />
          </div>
          <div class="twelve columns">
            <p class="answerMobile"><span class="important">IMPORTANTE:</span> Rispondi alla chiamata. Il tuo consulente
              personale ti assisterà e ti guiderà attraverso il processo.</p>
            <p class="questionMobile">Siamo disponibili 24 ore su 24, 7 giorni su 7 per qualsiasi domanda!</p>
            <p class="start"><a href="javascript:redirect()" class="deposit">Clicca qui per iniziare »</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="twelve columns footer">
        <p>Questo sito web non è un'agenzia di stampa, un sito di informazioni o un blog. È un sito web che utilizza
          materiale pubblicitario con storie per riflettere lo scopo dei servizi e dei prodotti offerti. Pertanto, le
          storie su questo sito web sono anche materiali pubblicitari o di pubbliche relazioni, collegati a informazioni
          e funzioni per comprendere l'idea presentata. Esclusione di responsabilità generale: le attività nel settore
          degli investimenti sono molto rischiose e possono comportare la perdita totale dell'importo investito.
          Pertanto, queste attività non sono adatte a tutti i tipi di investitori. Non investire denaro che non puoi
          permetterti di perdere. Prima di decidere di intraprendere questo tipo di investimento, dovresti essere
          consapevole di tutti i rischi e chiedere consiglio a un consulente finanziario indipendente e ufficiale.</p>
      </div>
    </div>
  </div>

  <script src="./../assets/js/jquery.min.js"></script>
  <script src="./../assets/js/thanks.js"></script>
</body>

</html>