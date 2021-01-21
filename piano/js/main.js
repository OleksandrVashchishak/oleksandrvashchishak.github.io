let C, D, E, F, G, A, B
const noteArr = [C, D, E, F, G, A, B]
const noteArrSave = [C, D, E, F, G, A, B]
const sourceArr = ['../sound/C.wav', '../sound/D.wav', '../sound/E.wav', '../sound/F.wav', '../sound/G.wav', '../sound/A.wav', '../sound/B.wav']
const keyArr = ['KeyQ', 'KeyW', 'KeyE', 'KeyR', 'KeyT', 'KeyY', 'KeyU']

const arrSelector = document.querySelectorAll('.noteSelector')

for (let i = 0; i < keyArr.length; i++) {
    noteArr[i] = new Audio(sourceArr[i])
    arrSelector[i].addEventListener('click', () => {
    noteArr[i].play()
    arrSelector[i].classList.add('active')
    setInterval( arrSelector[i].classList.remove('active'), 200)
    });

    document.addEventListener('keydown', (e) => {
        if (e.code == keyArr[i]) {
            noteArr[i].play();
            arrSelector[i].classList.add('active')
        }
    });

    document.addEventListener('keyup', (e) => {
        if (e.code == keyArr[i]) {
            noteArr[i].pause();
            noteArr[i].currentTime = 0;
            arrSelector[i].classList.remove('active')
        }
    });
}


    

// save sound functions
const saveBtn = document.querySelector('.saveBtn')
const stopBtn = document.querySelector('.stopBtn')

let stopFunctionVariable = false
const stopSaveVariable = () => {
     stopFunctionVariable = true
}

stopBtn.addEventListener('click', stopSaveVariable)
saveBtn.addEventListener('click', () => {
startSave()
})

let saveObg ={}
const startSave = () => {
let savePluser = 0;

const saveTrack = () => {
    if(stopFunctionVariable == true){
        return
    }
    savePluser++
    saveObg[savePluser] = 0
    for (let i = 0; i < keyArr.length; i++) {
    document.addEventListener('keydown', (e) => {
        saveObg[savePluser] = e.code
    })
}
console.log(saveObg);
}

setInterval( saveTrack, 100)
}

// load sound function
const loadBtn = document.querySelector('.loadBtn')
const startLoadSound = () => {
let loadPluser = 0
const loadTrack = () => {
loadPluser++
for (let i = 0; i < keyArr.length; i++) {
if (saveObg[loadPluser] == keyArr[i]) {
    noteArr[i].play();
}
}
}
setInterval( loadTrack, 100)
console.log(saveObg);
}

loadBtn.addEventListener('click', startLoadSound)