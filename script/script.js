function updateWorkTimer(endWorkTime) {
    const valueSeconds = Math.max(0, Math.floor((endWorkTime - Date.now()) / 1e3));
    const minutes = Math.floor(valueSeconds / 60);
    const seconds = valueSeconds % 60;

    document.title = `${('0' + minutes).slice(-2)}:${('0' + seconds).slice(-2)}`;

    if (!valueSeconds) {
        delete localStorage.endTime;
        return console.log('Время вышло!');
    }

    setTimeout(updateWorkTimer, 1000, endWorkTime);
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
    const data = await response.text();
    let regex = /@@(.*?)@@/;
    let result = data.match(regex);
    let currentTime = Date.now();
    return currentTime + '|' + result[1];
}

async function changeHas(id) {
    let dataToSend = {
        id,
    };

    let options = {
        method: 'POST',
        body: JSON.stringify(dataToSend),
        headers: {
            'Content-Type': 'application/json; charset=UTF-8',
        },
    };

    const response = await fetch(location.href, options);
    const data = await response.text();

    return ('dqwqdw');
}

let endWorkTime = 0;

let id = +localStorage.id || 1;
localStorage.id = id;

let task = await sendNumber(id);

task = task.split('|');
task[2] &&= 2;
// console.log(task);
console.log(task);
let has = +task[3];
if (!task[2]) {
    console.log('qwdqdwqdw')
}

console.log('has: ' + has);
localStorage.id = ++id;
console.log([localStorage.id]);
if (has === 0) {
    // console.log('bibi');
    has = 1;
    if (localStorage.endWorkTime) {
        endTime = Number(localStorage.endWorkTime);
        updateWorkTimer(endWorkTime);
    } else {
        endWorkTime = convert(+task[0], +task[2]);
        localStorage.endTime = endWorkTime;

        updateWorkTimer(endWorkTime);
    }

    changeHas(id).then((id) => {
        console.log(id);
    }).catch(console.log);
}

function convert(seconds, time) {
    return seconds + (time * 1000);
}




















