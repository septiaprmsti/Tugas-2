const jam_kerja = document.getElementById('jam_kerja')
const col_upah =  document.getElementById('col_upah')
const col_jam =  document.getElementById('col_jam')
const btn_hitung = document.getElementById('hitung')
const gaji = document.getElementById('gaji_pokok')
const total_gaji = document.getElementById('total')
const upah_lembur = document.getElementById('upah_lembur')


const setJamLembur = 48

jam_kerja.addEventListener('keyup',(e)=>{
  const value = e.target.value

  if(value>setJamLembur){
    col_upah.className = "col-12"
    col_jam.className = "col-12"
  }else{
    col_upah.className = "d-none"
    col_jam.className = "col-12"
  }
})

function toAngka(str) { 
  var num = str.replace(/[^0-9]/g, ''); 
  return parseInt(num,10); 
}



btn_hitung.addEventListener('click',()=>{
  const gajiInt = toAngka(gaji.value)

  if(col_upah.classList.contains('d-none') && jam_kerja.value!=""){
    const total = jam_kerja.value * gajiInt

    total_gaji.value = convertToRupiah(total)
  }

  else{
    const jam_lembur = jam_kerja.value - setJamLembur
    const total = (gajiInt*setJamLembur) + (jam_lembur*(gajiInt+(gajiInt * (upah_lembur.value/100))))
    total_gaji.value = convertToRupiah(total)
  }
})


function convertToRupiah(angka)
{
	var rupiah = '';		
	var angkarev = angka.toString().split('').reverse().join('');
	for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
}





