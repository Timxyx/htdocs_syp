function reloadFunc(){
    setTimeout(function(){window.location.href = window.location.href;}, 5000);
}



function startWatch(){
    let time = 0;
    let outTime = 0;
    let diff = 0;
    let hours;
    let minutes;
    let seconds;
    let out = ``;
    console.log("dude");
    setInterval(()=>{
        time++;
        
        let arr = [];
        arr = document.querySelectorAll(".counter");
        
        arr.forEach((item, index)=>{
            diff = Number(item.getAttribute('diff'));
            outTime = time + outTime + diff;
            hours = Math.floor(outTime / 3600);
            minutes = Math.floor((outTime % 3600) / 60);
            seconds = outTime % 60;
            out = `${hours} : ${minutes} : ${seconds}`

            console.log(item);
            console.log(out);
            item.innerHTML = out;
            outTime = 0;
            console.log(out);
        })
        
    }, 1000);
}
window.onload = startWatch();