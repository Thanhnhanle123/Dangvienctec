/* JS comes here */
function runSpeechRecognition() {
  // get output div reference
  var output = document.getElementById("output");
  // get action element reference
  var action = document.getElementById("action");
      var myForm = document.getElementById("myForm");
      // new speech recognition object
      var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
      var recognition = new SpeechRecognition();
      recognition.lang = 'vi-VI';
      recognition.continuous = false;

      // This runs when the speech recognition service starts
      recognition.onstart = function() {
          action.innerHTML = "<small>Đang lắng nghe....</small>";
      };

      recognition.onspeechend = function() {
          action.innerHTML = "<small>Đã dừng, kết quả trả về...</small>";
          recognition.stop();
      }

      // This runs when the speech recognition service returns result
      recognition.onresult = function(event) {
          var transcript = event.results[0][0].transcript;
          var confidence = event.results[0][0].confidence;
          output.value = transcript;
          output.classList.remove("hide");
      };
       // start recognition
       recognition.start();
}
