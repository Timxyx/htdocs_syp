


function startWatch(){
    let time = 0;
    console.log("dude");
    setInterval(()=>{
        time++;

        let hours = Math.floor(time / 3600);
        let minutes = Math.floor((time % 3600) / 60);time
        let seconds = time % 60;
        let out = `${hours} : ${minutes} : ${seconds}`
        document.getElementById("stopwatch").innerHTML = out;
    }, 1000);
}