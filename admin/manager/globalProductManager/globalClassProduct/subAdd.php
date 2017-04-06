<?php
$mid = $_GET['mid']; //主類別id

$sqlMainTitle = "SELECT * FROM Admin_GlobalProductMainClass WHERE  AGPMC_ID  = '".$mid."'";
$rsMainTitle = $Language_db->query($sqlMainTitle);
$dataMainTitle = $rsMainTitle->fetch();

$mainName = $dataMainTitle['AGPMC_Name']; //主類別名稱
?>
<script>
function upSubmit(){
  var checkstatus = 1; //先預設有值
  //先清除alert狀態
  $('#titleAlert').html(' ');

  if(!$('#title').val()) {
    $('#titleAlert').html('<i class="fa fa-warning"> 請輸入標題！</i>');
    checkstatus=0;
  }

  if(checkstatus==1) {
    ajaxPro(); //執行ajax
  }
} //function upSubmit(){

function ajaxPro() {
  //var URLs  = "manager/<?=$mainDirectory;?>/<?=$subDirectory;?>/index.php?secondURL=process";
  var URLs  = "manager/<?=$mainDirectory;?>/<?=$subDirectory;?>/subProcess.php";
  $.ajax({
    url: URLs,
    data: $('#formAdd').serialize(),
    type:"POST",
    async:false, //有回傳值才會執行以下的js
    dataType:'json',
      
    success: function(msg){ //成功執行完畢
      swal({
        title:msg.remsg,
        text: "",
        type: "success"
        },
        function() {
          window.location.href='page_index.php?pageData=<?=$subDirectory;?>&secondURL=subList&mid=<?=$mid?>';
        }
      );
    },
    /*
    beforeSend:function(){ //執行中
    },
    complete:function(){ //執行完畢,不論成功或失敗
    },
    */
    error:function(xhr, ajaxOptions, thrownError){ //丟出錯誤
      alert(xhr.status);
      alert(thrownError);
      //alert('更新失敗!');
    }
  });
}
</script>

<div id="pageMainWarp">
  <div id="pageWarp">
    <div id="pageWarpTR">
      <?php
      include('aside.php');
      ?>
      <section id="rightWarp">
        <div id="placeWarp" class="boxWarp">
          <div class="title red_T">目前位置：</div>
          <span><?=$pageMainTitle;?></span>
          <span>></span>
          <a href="page_index.php?pageData=<?=$subDirectory?>" title="<?=$pageTitle;?>">
            <?=$pageTitle;?>
          </a>
          <span>></span>
          <a href='page_index.php?pageData=<?=$subDirectory?>&secondURL=subList&mid=<?=$mid;?>'>
            <span><?="【 ".$mainName." 】";?> - 次類別管理</span>
          </a>
          <span>></span>
          <span>新增</span>
        </div>
        <div class="clearBoth"></div>
        <div id="pageIndexWarp" class="boxWarp">
         
          <div id="newsWarp" class="boxWarp">
            <h2 class="red">資料新增</h2>
            <div class="tableWarp">
              <div id="formTable">
                <form id="formAdd" name="formAdd">
                  <input type="hidden" name="act" value="add">
                  <table>
                    <tr>
                      <td class="num titleTxt" style='width:100px;'>主類別選擇</td>
                      <td class="txtLeft" style="text-align:left;">
                        <select name="mainSelect">
                          <?php
                          $mainSql = "select * from Admin_GlobalProductMainClass ORDER BY AGPMC_ID DESC";
                          $mainRs = $Language_db->query($mainSql);
                          while($mainData = $mainRs->fetch()) {
                            if($mainData['AGPMC_ID'] == $mid) {
                              echo "<option value='".$mainData['AGPMC_ID']."' selected>".$mainData['AGPMC_Name']."</option>";
                            } else {
                              echo "<option value='".$mainData['AGPMC_ID']."'>".$mainData['AGPMC_Name']."</option>";
                            }
                          } //while($mainData = $mainRs->fetch()) {
                          ?>
                        </select> 
                      </td>
                    </tr>
                    <tr>
                      <td class="num titleTxt">次類別標題</td>
                      <td class="txtLeft" style="text-align:left;">
                        <input type="text" name="title" id="title" placeholder="請輸入次類別標題"> 
                        <span id="titleAlert"></span>
                      </td>
                    </tr>
                    <tr>
                      <td class="num titleTxt">備註</td>
                      <td class="txtLeft" style="text-align:left;">
                        <textarea name="remark" id="remark" placeholder="請輸入備註"></textarea>
                      </td>
                    </tr>
                  </table>
                </form>
              </div><!--<div id="formTable">-->  
            </div>
          </div>
        <div class="pageBtnWarp">
          <ul>
            <li><button class="green" onclick="location.href='page_index.php?pageData=<?=$_GET['pageData']?>&secondURL=subList&mid=<?=$mid?>'">返回列表</button></li>
            <li>
              <button class="red" onclick="upSubmit()">新增</button>
            </li>
          </ul>
        </div>  
      </section>
      <div class="clearBoth"></div>
    </div>
  </div>
</div>
