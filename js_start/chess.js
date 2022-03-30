const SIZE = 8;

function create_chess() {
    let table = document.createElement("table");
    table.className = "chess-board";

    let header_line = create_header_line();
    table.append(header_line);

    for(let i = SIZE; i >= 1; i--) {
        let line = create_line(i);
        table.append(line);
    }

    let c = document.getElementById("chess_board");
    c.innerHTML = "";
    c.append(table);
}

function create_header_line() {
    let line = document.createElement("tr");
    for(let symbol of " abcdefgh") {
        let cell = document.createElement("th");
        cell.innerText = symbol;
        line.append(cell);
    }

    return line;
}

function create_line(number) {
    let line = document.createElement("tr");

    let head_cell = document.createElement("th");
    head_cell.innerText = number;
    line.append(head_cell);

    for(let i = 0; i < SIZE; i++) {
        let cell = document.createElement("td");

        if(number % 2 == 0) {
            if(i % 2 != 0)
                cell.className = "black";
            else
                cell.className = "white";
        } else {
            if(i % 2 == 0)
                cell.className = "black";
            else
                cell.className = "white";
        }

        line.append(cell);
    }

    return line;
}
