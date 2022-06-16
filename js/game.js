$(function () {

	const puzzle = []
	const puzzleField = []

	let countPuzzles = 25

	let countImage = 6;
	let chosenImage;
	let chosen = false;


	// функция прорисовки слайдера для выбора картинки
	function drawSlider() {
		$('.main').append($('<div></div>').addClass('slider'))

		for (let i = 0; i < countImage; i++) {
			$('.slider').append($('<div></div>')
				.addClass('slider__item')
				.attr('data-index', i + 2)
				.css('background', `url('./img/puzzle/pic${i + 2}/bg.jpg') 0 0/100% 100% no-repeat`)
			);
		}
	}
	drawSlider()

	$('.slider').slick({
		arrows: true,
		dots: true,
		adaptiveHeight: false,
		slidesToShow: 3,
		slidesToScroll: 3,
		speed: 300,
		easing: 'linear',
		infinite: false,
		initialSlide: 0,
		autoplay: false,
		autoplaySpeed: 500,
		pauseOnFocuse: true,
		pauseOnHover: true,
		pauseOnDotsHover: true,
		draggable: true,
		swipe: true,
		touchThreshold: 5,
		touchMove: true,
		waitForAnimate: true,
		centerMode: false,
		variableWidth: false,
		rows: 1,
		slidesPerRow: 1,
		vertical: false,
		verticalSwiping: true,
	});


	// функция выбора картинки
	function choiceImage() {
		$(".slider__item").click(function () {
			chosenImage = $(this).attr('data-index')
			$('.slider__item').empty();
			$(this).append($('<div></div>')
				.addClass('icon')
				.css('background', `url('./img/icons/checkmark.png') 0 0/100% 100% no-repeat`)
			);

			if (chosen == false) {
				$('.main').append($('<button></button>').addClass('go-btn').text('GO'));

				$(".go-btn").click(function () {
					goPuzzle()
				})
			}

			chosen = true;
		})
	}
	choiceImage()

	// функция перехода от выбора к пазду
	function goPuzzle() {
		$('.slider').hide()
		$('.go-btn').hide()
		drawPuzzle()
		drawPuzzlesField()
		createPuzzle()
		mouseDown()
	}

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
		$('.main').append($('<div></div>')
			.addClass('puzzle')
			.css('background', `url('./img/puzzle/pic${chosenImage}/bg.jpg') 0 0/100% 100% no-repeat`)
		);
		for (let i = 0; i < countPuzzles; i++) {
			$('.puzzle').append($('<div></div>').addClass('cell'))
		}
	}

	// drawPuzzle()


	function drawPuzzlesField() {
		$('.main').append($('<div></div>').addClass('puzzles-field'))
	}

	// drawPuzzlesField()


	// функция создания пазлов 
	function createPuzzle() {
		for (let i = 0; i < countPuzzles; i++) {
			puzzle.push(i + 1);
		}

		shuffle(puzzle)

		for (let i = 0; i < countPuzzles; i++) {
			$('.puzzles-field').append($('<div></div>')
				.addClass('cell-puzzle')
				.attr('id', puzzle[i])
				.css('background', `url('./img/puzzle/pic${chosenImage}/${puzzle[i]}.jpg') 0 0/100% 100% no-repeat`)
			);
		}
	}

	// createPuzzle()



	// функциясрабатывание mousedown
	function mouseDown() {
		$(".cell-puzzle").mousedown(function (event) {
			if ($(this).hasClass('fixed') == false) {

				$(this).css({
					"position": "absolute",
					"z-index": "1000"
				});


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
	}




	// центрирование элемента к мышке
	function moveAt(pageX, pageY, element) {

		element.css({
			'left': pageX - element.width() / 2 + 'px',
			'top': pageY - element.height() / 2 + 'px'
		});
	}





	// фунция проверки пересечения фигуры и ячеек
	function cross(puzzle, cells) {

		cells.each(function (index) {

			if (puzzle.offset().left + puzzle.width() > $(this).offset().left + $(this).width() / 2
				&& puzzle.offset().left < $(this).offset().left + $(this).width() / 2
				&& puzzle.offset().top + puzzle.height() > $(this).offset().top + $(this).height() / 2
				&& puzzle.offset().top < $(this).offset().top + $(this).height() / 2) {

				$(this).css('background', 'black');
			} else {
				$(this).css('background', '');
			}

		});

	}

	// функция прилипания фигуры к полю
	function stick(puzzle, cells) {
		cells.each(function (index) {

			if (puzzle.offset().left + puzzle.width() > $(this).offset().left + $(this).width() / 2
				&& puzzle.offset().left < $(this).offset().left + $(this).width() / 2
				&& puzzle.offset().top + puzzle.height() > $(this).offset().top + $(this).height() / 2
				&& puzzle.offset().top < $(this).offset().top + $(this).height() / 2) {


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

		win()
	}


	function win() {
		let result = puzzleField.reduce((sum, current) => sum + current, 0);
		if (result == countPuzzles) alert('W I N')
	}



});
