var toggle = document.getElementById('switch');
var toggleContainer = document.getElementById('toggle-container');
var toggleNumber;

toggle.addEventListener('click', function() {
    toggleNumber = !toggleNumber;
	if (toggleNumber) {
		toggleContainer.style.clipPath = 'inset(0 0 0 50%)';
        toggleContainer.style.backgroundColor = '#D74046';
        $(".simple").show();
        $(".vecchio").hide();
	} else {
		toggleContainer.style.clipPath = 'inset(0 50% 0 0)';
        toggleContainer.style.backgroundColor = 'dodgerblue';
        $(".vecchio").show();
        $(".simple").hide();
	}
});

$(document).ready(function(){
    $(".simple").hide();
});