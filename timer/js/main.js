document.addEventListener('DOMContentLoaded', () => {

  // Unix timestamp (in seconds) to count down to
  var twoDaysFromNow = new Date("2025-05-29T19:00:00").getTime();

  // Set up FlipDown
  var flipdown = new FlipDown(1748538000, {theme: "dark",})

    // Start the countdown
    .start()

    // Do something when the countdown ends
    .ifEnded(() => {
      console.log("It's Aperol Time!");
    });

  // Show version number
  var ver = document.getElementById('ver');
  ver.innerHTML = flipdown.version;
});
