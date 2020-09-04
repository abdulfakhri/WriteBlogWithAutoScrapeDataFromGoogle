<!--<audio src="test.wav" controls autoplay preload></audio>-->
 
<audio id="player" src="test.wav"></audio>
<div> 
  <button onclick="document.getElementById('player').play()">Play</button> 
  <button onclick="document.getElementById('player').pause()">Pause</button> 
  <button onclick="document.getElementById('player').volume += 0.1">Vol+ </button> 
  <button onclick="document.getElementById('player').volume -= 0.1">Vol- </button> 
</div>