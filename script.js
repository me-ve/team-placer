let Summoners = new Array(10);
let locked = new Array(10);
let initialized = false;

function GetSummoners() {
    for (let i = 0; i < Summoners.length; i++) {
        let id = "summoner" + i;
        Summoners[i] = document.forms["teams"][id + "name"].value;
        locked[i] = document.forms["teams"][id + "lock"].checked == true;
    }
}

function SetSummoners() {
    for (let i = 0; i < Summoners.length; i++) {
        let id = "summoner" + i;
        document.forms["teams"][id + "name"].value = Summoners[i];
    }
}

function Shuffle() {
    GetSummoners();
    let temp = new Array(10);
    for (let i = 0; i < Summoners.length; i++) {
        if (locked[i]) temp[i] = Summoners[i];
    }
    for (let i = 0; i < Summoners.length; i++) {
        if (!locked[i]) {
            let emptyCell = false;
            let rand;
            //losuje dopoki nie trafi na pusta komorke
            while (!emptyCell) {
                rand = Math.floor(Math.random() * 10);
                if (temp[rand] == null) emptyCell = true;
            }
            temp[rand] = Summoners[i];
        }
    }
    Summoners = temp;
    SetSummoners();
}

function Clear() {
    for (let i = 0; i < Summoners.length; i++) {
        Summoners[i] = "";
    }
    SetSummoners();
}

function GetFromFile() {
    const file = this.files[0];
    const { name: fileName } = file;
    var reader = new FileReader();
    reader.onload = function(evt) {
        data = evt.target.result;
        let dataJSON = JSON.parse(data);
        Summoners = dataJSON;
        SetSummoners();
    }
    reader.readAsText(file);
}

function Import() {
    const input = document.createElement("input");
    input.addEventListener("change", GetFromFile);
    input.type = "file";
    input.style = "visibility: hidden";
    input.id = "importfile";
    document.body.appendChild(input);
    input.click();
    document.body.removeChild(input);
}

function Export() {
    GetSummoners();
    const a = document.createElement("a");
    a.href = URL.createObjectURL(new Blob([JSON.stringify(Summoners, null, 2)], {
        type: "text/plain"
    }));
    var date = new Date();
    var dateStr =
        ("00" + (date.getMonth() + 1)).slice(-2) + "/" +
        ("00" + date.getDate()).slice(-2) + "_" +
        date.getFullYear() + "_" +
        ("00" + date.getHours()).slice(-2) + "_" +
        ("00" + date.getMinutes()).slice(-2) + "_" +
        ("00" + date.getSeconds()).slice(-2);
    let filePath = "summoners_" + dateStr + ".json";
    a.setAttribute("download", filePath);
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}