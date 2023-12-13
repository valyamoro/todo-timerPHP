let endTime = 0;

function convert(time, seconds)
{
    return time + 1000 * seconds;
}

if (localStorage.endTime) {
    endTime = Number(localStorage.endTime);
    updateTimer();
} else {
    fetch('/index.php').then(async (response) => {
        console.log(response);
        let temp = await response.text();
        endTime = convert(+temp, 30);
        localStorage.endTime = endTime;
        updateTimer();
    });
}


function updateTimer() {
    const valueSeconds = Math.max(0,Math.floor((endTime - Date.now()) / 1e3));
    const minutes = Math.floor(valueSeconds / 60);
    const seconds = valueSeconds % 60;

    document.title = `${('0' + minutes).slice(-2)}:${('0' + seconds).slice(-2)}`;

    if (!valueSeconds) {
        delete localStorage.endTime;
        return console.log('Время вышло');
    }

    setTimeout(updateTimer, 1000);
}



