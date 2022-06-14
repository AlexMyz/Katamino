var rows = 5;
var cols = 5;

var currTile;
var otherTile;

window.onload = function() {
    // ініціалізація поля
    for(let r = 0; r < rows; r++) {
        for(let c = 0; c < cols; c++) {
            let tile = document.createElement("img");
            tile.src = "./img/puzzle/blank1.jpg";

            document.getElementById("board").append(tile)
        }
    }
    console.log('awd');
}

//пазли
let pieces = [];
for(let i = 0; i < cols*rows; i++) {
    pieces.push(i.toString()); //від "1" до "25" додаєтсья в масив (імена картинок)
}
//рандомне розтяшування пазлів
pieces.reverse();
for(let i = 0; i < pieces.length; i++) {
    let j = Math.floor(Math.random() * pieces.length);
    let temp = pieces[i];
    pieces[i] = pieces[j];
    pieces[j] = temp;
}
//додавання пазлів на поле
for(let i = 0; i < pieces.length; i++) {
    let tile = document.createElement("img");
    tile.src = "./img/puzzle/" + pieces[i] + ".jpg";

    document.getElementById("pieces").append(tile);
}