function updateTimer(endTime) {
    const valueSeconds = Math.max(0, Math.floor((endTime - Date.now()) / 1e3));
    const minutes = Math.floor(valueSeconds / 60);
    const seconds = valueSeconds % 60;

    document.title = `${('0' + minutes).slice(-2)}:${('0' + seconds).slice(-2)}`;

    if (!valueSeconds) {
        delete localStorage.endTime;
        return console.log('Время вышло!');
    }

    setTimeout(functions, 1000, endTime);
}

const HELLO = 'hello';

export {
    updateTimer,
    HELLO,
};
