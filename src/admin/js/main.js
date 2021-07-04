
function deleteIbent(i){
 document.getElementById("deleteModal").textContent = '「' + i + '」を削除してよろしいですか？';
 document.getElementById("deleteImg").value=i;
}

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


//Newsモーダル起動
function modal(){
let postDate = document.getElementById("postDate");
let postTitle = document.getElementById("postTitle");
let postText = document.getElementById("postText");
let postId = document.getElementById("postId");
let modalDate = document.getElementById("modalDate");
let modalTitle = document.getElementById("modalTitle");
let modalText = document.getElementById("modalText");
let modalId = document.getElementById("modalId");

modalDate.value = postDate.value;
modalTitle.value = postTitle.value;
modalText.value = postText.value;
modalId.value=postId.value;
}

//brand topimage モーダル起動
function brandtopmodal(){
  let brandId = document.getElementById("brandId");
  let brandName = document.getElementById("brandName");
  let brandAddress = document.getElementById("brandAddress");
  // let brandTopImage = document.getElementById("brandTopImage");
  let brandTitle1 = document.getElementById("brandTitle1");
  let brandContent1 = document.getElementById("brandContent1");
  let brandImage1 = document.getElementById("brandImage1");
  let brandTitle2 = document.getElementById("brandTitle2");
  let brandContent2 = document.getElementById("brandContent2");
  let brandImage2 = document.getElementById("brandImage2");

  let modalId = document.getElementById("modalId");
  let modalName = document.getElementById("modalName");
  let modalAddress = document.getElementById("modalAddress");
  // let modalTopImage = document.getElementById("modalTopImage");
  let modalTitle1 = document.getElementById("modalTitle1");
  let modalContent1 = document.getElementById("modalContent1");
  let modalImage1 = document.getElementById("modalImage1");
  let modalTitle2 = document.getElementById("modalTitle2");
  let modalContent2 = document.getElementById("modalContent2");
  let modalImage2 = document.getElementById("modalImage2");

  modalId.value=brandId.value;
  modalName.value=brandName.value;
  modalAddress.value=brandAddress.value;
  // modalTopImage.value=brandTopImage.value;
  modalTitle1.value=brandTitle1.value;
  modalContent1.value=brandContent1.value;
  modalImage1.value=brandImage1.value;
  modalTitle2.value=brandTitle2.value;
  modalContent2.value=brandContent2.value;
  modalImage2.value=brandImage2.value;
  
  }
  

//brand image1 モーダル起動
function brand1modal(){
  console.log("aaa");
  let brandId = document.getElementById("brandId");
  let brandName = document.getElementById("brandName");
  let brandAddress = document.getElementById("brandAddress");
  let brandTopImage = document.getElementById("brandTopImage");
  let brandTitle1 = document.getElementById("brandTitle1");
  let brandContent1 = document.getElementById("brandContent1");
  // let brandImage1 = document.getElementById("brandImage1");
  let brandTitle2 = document.getElementById("brandTitle2");
  let brandContent2 = document.getElementById("brandContent2");
  let brandImage2 = document.getElementById("brandImage2");

  let modalId = document.getElementById("modal1Id");
  let modalName = document.getElementById("modal1Name");
  let modalAddress = document.getElementById("modal1Address");
  let modalTopImage = document.getElementById("modal1TopImage");
  let modalTitle1 = document.getElementById("modal1Title1");
  let modalContent1 = document.getElementById("modal1Content1");
  // let modalImage1 = document.getElementById("modalImage1");
  let modalTitle2 = document.getElementById("modal1Title2");
  let modalContent2 = document.getElementById("modal1Content2");
  let modalImage2 = document.getElementById("modal1Image2");

  modalId.value=brandId.value;
  modalName.value=brandName.value;
  modalAddress.value=brandAddress.value;
  modalTopImage.value=brandTopImage.value;
  modalTitle1.value=brandTitle1.value;
  modalContent1.value=brandContent1.value;
  // modalImage1.value=brandImage1.value;
  modalTitle2.value=brandTitle2.value;
  modalContent2.value=brandContent2.value;
  modalImage2.value=brandImage2.value;
  console.log("bbb");
  }

  //brand image2モーダル起動
function brand2modal(){
  let brandId = document.getElementById("brandId");
  let brandName = document.getElementById("brandName");
  let brandAddress = document.getElementById("brandAddress");
  let brandTopImage = document.getElementById("brandTopImage");
  let brandTitle1 = document.getElementById("brandTitle1");
  let brandContent1 = document.getElementById("brandContent1");
  let brandImage1 = document.getElementById("brandImage1");
  let brandTitle2 = document.getElementById("brandTitle2");
  let brandContent2 = document.getElementById("brandContent2");
  // let brandImage2 = document.getElementById("brandImage2");

  let modalId = document.getElementById("modal2Id");
  let modalName = document.getElementById("modal2Name");
  let modalAddress = document.getElementById("modal2Address");
  let modalTopImage = document.getElementById("modal2TopImage");
  let modalTitle1 = document.getElementById("modal2Title1");
  let modalContent1 = document.getElementById("modal2Content1");
  let modalImage1 = document.getElementById("modal2Image1");
  let modalTitle2 = document.getElementById("modal2Title2");
  let modalContent2 = document.getElementById("modal2Content2");
  // let modalImage2 = document.getElementById("modalImage2");

  modalId.value=brandId.value;
  modalName.value=brandName.value;
  modalAddress.value=brandAddress.value;
  modalTopImage.value=brandTopImage.value;
  modalTitle1.value=brandTitle1.value;
  modalContent1.value=brandContent1.value;
  modalImage1.value=brandImage1.value;
  modalTitle2.value=brandTitle2.value;
  modalContent2.value=brandContent2.value;
  // modalImage2.value=brandImage2.value;
  
  }



/************************************
* contactページ
*************************************/

// 送信確認
function confirm_mail() {
  let select = confirm("本当に送信してよろしいですか？");
  return select;
}

// modalに反映
function detailOpen(i) {
  let hdn1 = 'contactIdHdn' + i;
  let hdn2 = 'contactTitleHdn' + i;
  let hdn3 = 'contactDetailHdn' + i;
  let hdn4 = 'contactStatusHdn' + i;
  let hdn5 = 'contactMailHdn' + i;
  let hdn6 = 'contactNameHdn' + i;

  let idHdn = document.getElementById(hdn1);
  let titleHdn = document.getElementById(hdn2);
  let detailHdn = document.getElementById(hdn3);
  let statusHdn = document.getElementById(hdn4);
  let mailHdn = document.getElementById(hdn5);
  let nameHdn = document.getElementById(hdn6);

  let titleArry;

  // 名前
  document.getElementById('contactModalLabel').innerHTML = nameHdn.value + ' 様';
  // 宛先
  document.getElementById('contactModalEmail').value = mailHdn.value;
  // 問い合わせ項目
  document.getElementById('contactModalTitle').innerHTML = '';
  if(titleHdn.value.indexOf(',') !== -1) {
    titleArry = titleHdn.value.split(',');
    titleArry.forEach(function(element) {
      document.getElementById('contactModalTitle').innerHTML += '・' + element + "<br>";
    });
  } else {
    document.getElementById('contactModalTitle').innerHTML = titleHdn.value;
  }
  // 問い合わせ内容
  document.getElementById('contactModalContent').innerHTML = detailHdn.value;


  // AJAXでステータスを更新（未読→未返信）
  if(statusHdn.value === '未読') {
    $.ajax({
      url: '../parts/ajax.php', //送信先
      type: 'POST', //送信方法
      datatype: 'text', //受け取りデータの種類
      data: {
        'contact_id': idHdn.value
      }

    //Ajax通信が成功した時
    }).done(function(data){
      console.log('通信成功');

    //Ajax通信が失敗した時
    }).fail(function(data){
      console.log('通信失敗');
    });
  }

}
