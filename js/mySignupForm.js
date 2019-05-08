$(function(){
 
    //아이디 중복 확인 소스
    var memberIdCheck = $('.memberIdCheck');
    var memberId = $('#user_id');
    var memberIdComment = $('.memberIdComment');
    var memberPw = $('#user_pass');
    var memberPw2 = $('#user_pass2');
    var memberPw2Comment = $('.memberPw2Comment');
    var memberEmailAddress = $('#user_email');
    var memberEmailAddressComment = $('.memberEmailAddressComment');
    var memberPhone = $('#user_tel');
    var memberPhoneComment = $('.memberPhoneComment');
    var idCheck = $('.idCheck');
    var pwCheck2 = $('.pwCheck2');
    var eMailCheck = $('.eMailCheck');
 
    memberIdCheck.click(function(){
        console.log(memberId.val());
        //memberId.val()은 $('.memberId').val()을 의미하죠 즉, 아이디 적는 공간에 있는 값을 의미 합니다.
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: '../member/memberIdCheck.php',
            data: {memberId: memberId.val()},
 
            success: function (json) {
                if(json.res == 'good') {
                    console.log(json.res);
                    memberIdComment.text('사용가능한 아이디 입니다.');
                    idCheck.val('1');
                }else{
                    memberIdComment.text('다른 아이디를 입력해 주세요.');
                    memberId.focus();
                }
            },
 
            error: function(){
              console.log('failed');
 
            }
        })
    });
 
    //비밀번호 동일 한지 체크
    memberPw2.blur(function(){
        //memberPw2.blur(function(){ 이 뜻은, 비밀번호 확인란을 입력후 그 확인란을 떠날때 함수가 작동 한다는 뜻
       if(memberPw.val() == memberPw2.val()){
           memberPw2Comment.text('비밀번호가 일치합니다.');
           pwCheck2.val('1');
       }else{
           memberPw2Comment.text('비밀번호가 일치하지 않습니다.');
 
       }
    });
 
    //이메일 유효성 검사
    memberEmailAddress.blur(function(){
        var regex=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
        //정규식을 이용하여 이메일을 제대로 입력했는지 안했는지 검사
        if(regex.test(memberEmailAddress.val()) === false){
            memberEmailAddressComment.text('이메일 형식이 올바르지 않습니다.');
            eMailCheck.val('1');
        }else{
            memberEmailAddressComment.text('올바른 이메일 입니다.');
        }
    });
 
});
 
 //값이 비었는지 아닌지만 확인해 봅니다
function checkSubmit(){
    var idCheck = $('.idCheck');
    var pwCheck2 = $('.pwCheck2');
    var eMailCheck = $('.eMailCheck');
    var memberAddress = $('#user_addr');
    var memberPhone = $('#user_tel');
    var memberName = $('.memberName');
 
 
    if(idCheck.val() == '1'){
        res = true;
    }else{
        res = false;
    }
    if(pwCheck2.val() == '1'){
        res = true;
    }else{
        res = false;
    }
    if(eMailCheck.val() == '1'){
        res = true;
    }else{
        res = false;
    }
 
    if(memberName.val() != ''){
        res = true;
    }else{
        res = false;
    }
    if(memberAddress.val() != ''){
        res = true;
    }else{
        res = false;
    }
    if(memberPhone.val() != ''){
        res = true;
    }else{
        res = false;
    }
 
    if(res == false){
        alert('회원가입 폼을 정확히 채워 주세요.');
    }
    return res;
 
}