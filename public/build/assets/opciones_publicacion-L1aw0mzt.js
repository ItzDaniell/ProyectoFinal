document.addEventListener("DOMContentLoaded",()=>{const o=document.querySelectorAll(".options-button"),e=document.querySelectorAll(".options-menu");o.forEach((n,s)=>{const t=e[s];n.addEventListener("click",d=>{d.stopPropagation();const c=!t.classList.contains("hidden");e.forEach(i=>i.classList.add("hidden")),c||t.classList.remove("hidden")})}),document.addEventListener("click",()=>{e.forEach(n=>n.classList.add("hidden"))})});