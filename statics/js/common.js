/* 
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-1 18:14:58
 */
function isPhone(phonenum){
    var re1 = /^(13|14|15|17|18)[0-9]{9}$/;
    if (re1.test(phonenum)){
        return true;
    }else{
        return false;
    }
}




