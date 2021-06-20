
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

$(function() {
  $('textarea[name="body"]').keyup(function() {
    if($('input[name="switchFormat"]:checked').val() == 'html') {
      $('#preview_body').html($('textarea[name="body"]').val());
    } else {
      $('#preview_body').text($('textarea[name="body"]').val());
    }
  });
  $('input[name="sort"]').click(function() {
    if($('input[name="switchFormat"]:checked').val() == 'html') {
      $('#preview_body').html($('textarea[name="body"]').val());
    } else {
      $('#preview_body').text($('textarea[name="body"]').val());
    }
  });
});
