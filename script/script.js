import {updateTimer, HELLO} from "./functions";
let endTime = 0;

let id = +localStorage.id || 1;
localStorage.id = id;

let task = await sendNumber('2');
task = task.split('|');
console.log(...task);

function convert(seconds, time) {
    return seconds + (time * 1000);
}

if (localStorage.endTime) {
    endTime = Number(localStorage.endTime);
    updateTimer(endTime);
} else {
    endTime = convert(+task[0], +task[2]);
    localStorage.endTime = endTime;

    updateTimer(endTime);
}


async function sendNumber(number) {
    let dataToSend = {
        number,
    };

    let options = {
        method: 'POST',
        body: JSON.stringify(dataToSend),
        headers: {
            'Content-Type': 'application/json; charset=UTF-8',
        },
    };

    const response = await fetch(location.href, options);
    // получать по определенному маршруту сервера чистые данные, не должно быть ничего кроме данных.
    const data = await response.text();
    // console.log(data);
    let regex = /@@(.*?)@@/;

    let result = data.match(regex);
    let currentTime = Date.now();
    return currentTime + '|' + result[1];
}














