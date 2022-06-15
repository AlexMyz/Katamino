//секундомір
minutesCount = 0,secondCount = 0,
minutes = document.getElementById('minutes')
second = document.getElementById('second')
//початок відрахунку
function startSW(){
	$("#pauseCount").removeAttr("disabled")
	$("#resetCount").removeAttr("disabled")
	$("#startCount").attr({"disabled":"disabled"})
	minutesSetInterval = setInterval(function(){
		minutesCount += 1
		minutes.innerHTML = minutesCount
	},60000);
	secondSetInterval = setInterval(function(){
		secondCount += 1
		if(secondCount > 59){
			secondCount = 1
		}
		second.innerHTML = secondCount
	},1000);
}
//пауза
function pauseSW(){
	$("#startCount").removeAttr("disabled")
	$("#pauseCount").attr({"disabled":"disabled"})
	clearInterval(minutesSetInterval)
	clearInterval(secondSetInterval)
}
//обнулення
function restartSW(){
	$("#pauseCount").attr({"disabled":"disabled"})
	$("#resetCount").attr({"disabled":"disabled"})
	$("#startCount").removeAttr("disabled")

	clearInterval(minutesSetInterval)
	clearInterval(secondSetInterval)
	minutesCount = 0,secondCount = 0
	minutes.innerHTML = minutesCount
	second.innerHTML = secondCount
}
// file = '';
// function radioget(getValue) {
// 	file = getValue;
// 	console.log(file);
// }
$(function(){
	$(".start-btn").click(function() {
		$(".main").css('display','block');
		$(".start-btn").css('display','none');
		startSW();
	});
	const puzzle = []
	const puzzleField = []

	let countPuzzles = 25

	function arrayPuzzleField() {
		for (let i = 0; i < countPuzzles; i++) {
			puzzleField[i] = 0
		}
	}

	arrayPuzzleField()

	// функция перемешивания массива в случайном порядке
	function shuffle(array) {
		for (let i = array.length - 1; i > 0; i--) {
			let j = Math.floor(Math.random() * (i + 1));
			[array[i], array[j]] = [array[j], array[i]]
		}
	}


	function drawPuzzle() {
		$('.main').append( $('<div></div>').addClass('puzzle') )
		for (let i = 0; i < countPuzzles; i++) {
			$('.puzzle').append( $('<div></div>').addClass('cell') )
		}
	}

	drawPuzzle()


	function drawPuzzlesField() {
		$('.main').append($('<div></div>').addClass('puzzles-field'))
	}

	drawPuzzlesField()

	
	
	// console.log(file);
	// функция создания пазлов 
	function createPuzzle() {
		for (let i = 0; i < countPuzzles; i++) {
			puzzle.push(i + 1);
		}

		shuffle(puzzle)
		for (let i = 0; i < countPuzzles; i++) {
			$('.puzzles-field').append($('<div></div>').addClass('cell-puzzle').attr('id', puzzle[i]).css('background', `url('./img/puzzle/pic1/${puzzle[i]}.jpg') 0 0/100% 100% no-repeat`))
		}
	}

	createPuzzle()



	// срабатывание mousedown
  	$(".cell-puzzle").mousedown(function(event){
  		if ($(this).hasClass('fixed') == false) {

  			$(this).css({
		  	"position": "absolute",
		  	"z-index": "1000"
		  });
		  console.log("1");

		  $(document.body).append(this)

		  moveAt(event.pageX, event.pageY, $(this));

		  $(document).mousemove((event) => {
		  	moveAt(event.pageX, event.pageY, $(this));
		  	cross($(this), $('.cell'))
		  })

		  $(document).mouseup(() => {
		  	$(document).off("mousemove");
		  	$(document).off("mouseup");
		  	stick($(this), $('.cell'))
		  });
  		}
	});

	

	// центрирование элемента к мышке
	function moveAt(pageX, pageY, element) {

	  	element.css({
	  		'left': pageX - element.width() / 2 + 'px',
	  		'top': pageY - element.height() / 2 + 'px'
		});
  	}





  	// фунция проверки пересечения фигуры и ячеек
  	function cross(puzzle, cells) {

  		cells.each(function(index) {

  			if (puzzle.offset().left + puzzle.width() > $(this).offset().left + $(this).width()/2 
	  			&& puzzle.offset().left < $(this).offset().left + $(this).width()/2 
	  			&& puzzle.offset().top + puzzle.height() > $(this).offset().top + $(this).height()/2
	  			&& puzzle.offset().top < $(this).offset().top + $(this).height()/2) {

	  			$(this).css('background', 'black');
	  		} else {
	  			$(this).css('background', '');
	  		}

  		});
  		 
  	}

  	// функция прилипания фигуры к полю
  	function stick(puzzle, cells) {
  		cells.each(function(index) {

  			if (puzzle.offset().left + puzzle.width() > $(this).offset().left + $(this).width()/2 
	  			&& puzzle.offset().left < $(this).offset().left + $(this).width()/2 
	  			&& puzzle.offset().top + puzzle.height() > $(this).offset().top + $(this).height()/2
	  			&& puzzle.offset().top < $(this).offset().top + $(this).height()/2) {


  				if (puzzleField[index] == 0) {
  					puzzle.css({
				  		'left': $(this).offset().left + 'px',
				  		'top': $(this).offset().top + 'px'
					});
  				}

				if (index + 1 == puzzle.attr('id')) {
					puzzleField[index] = 1
					puzzle.addClass('fixed')
				}

	  		}

  		});
  		win();
  	}


  	function win() {
  		let result = puzzleField.reduce((sum, current) => sum + current, 0);
  		if (result == countPuzzles) alert('W I N')
		pauseSW;
  	}

});
