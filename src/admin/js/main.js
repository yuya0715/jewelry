
// function deleteIbent(i){
//  document.getElementById("deleteModal").textContent = '「' + i + '」を削除してよろしいですか？';
//  document.getElementById("deleteImg").value=i;
// }

// input要素
if (document.getElementById('postImage') != undefined) {
  let fileInput = document.getElementById('postImage');
  // changeイベントで呼び出す関数
  const handleFileSelect = () => {
    let fileLabel = document.getElementsByClassName('custom-file-label');
    const fileInfo = fileInput.files;
    console.log(fileInfo[0]);
    fileLabel[0].innerHTML = fileInfo[0].name;
  }
  // ファイル選択時にhandleFileSelectを発火
  fileInput.addEventListener('change', handleFileSelect);
}


// contactページ
function detailOpen(i) {
  let hdn1 = 'contactTitleHdn' + i;
  let hdn2 = 'contactDetailHdn' + i;
  let titleHdn = document.getElementById(hdn1);
  let detailHdn = document.getElementById(hdn2);
  document.getElementById('contactModalLabel').innerHTML = titleHdn.value;
  document.getElementById('contactModalContent').innerHTML = detailHdn.value;
}
