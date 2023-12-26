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

function updateRestTime(endRestTime) {

}

async function sendNumber(number) {
    let dataToSend = {
        number,
    };
    delete localStorage.id;
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

async function changeHas() {
    // let formData = new FormData();
    // formData.append('has', '1');
    // formData.append('id', localStorage.id);
    // fetch(location.href, {
    //     method: 'POST',
    //     body: formData,
    // })
    //
    //     .then(response => {
    //         console.log(response);
    //     })
    //     .catch(error => {
    //         console.log('всё не гуд');
    //     });
    let id = localStorage.id;
    let dataToSend = {
        id,
    };
    delete localStorage.id;
    let options = {
        method: 'POST',
        body: JSON.stringify(dataToSend),
        headers: {
            'Content-Type': 'application/json; charset=UTF-8',
        },
    };

    const response = await fetch(location.href, options);
    const data = await response.text();

    // console.log(data);
}

let endWorkTime = 0;

let id = +localStorage.id || 1;
localStorage.id = id;

let task = await sendNumber(id);
task = task.split('|');

let has = task[3];
console.log(has);
if (+has === 0) {
    console.log('bibi');
    has = 1;
    if (localStorage.endWorkTime) {
        endTime = Number(localStorage.endWorkTime);
        updateWorkTimer(endWorkTime);
    } else {
        endWorkTime = convert(+task[0], +task[2]);
        localStorage.endTime = endWorkTime;

        updateWorkTimer(endWorkTime);
    }
    // changeHas().then(r => 'hello');
} else {
    console.log('second');
    localStorage.id = id + 1;
}

function convert(seconds, time) {
    return seconds + (time * 1000);
}




















