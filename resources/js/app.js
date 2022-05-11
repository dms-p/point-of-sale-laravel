require('./bootstrap');
require('alpinejs');
import Swal from 'sweetalert2'

const swalAlert=(icon,title,text,timeout=false)=>{
    Swal.fire({
        'icon':icon,
        'title':title,
        'text':text,
        'timer':timeout
    });
}
const swalConfirm=(title,method,param)=>{
    Swal.fire({
        'icon':'question',
        "title":title,
        "showCancelButton":true
    }).then((result)=>{
        if (result.isConfirmed) {
            livewire.emit(method,param);
        }
    })
}
document.addEventListener('livewire:load',()=>{
    Livewire.on('swalAlert',data=>{
        swalAlert(data.icon,data.title,data.text);
    })
    Livewire.on('swalConfirm',data=>{
        swalConfirm(data.title,data.method,data.param);
    })
    Livewire.on('console',data=>{
        console.log(data);
    })
    Livewire.on('print',()=>{
        window.print();
    })
})