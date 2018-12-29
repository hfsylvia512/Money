<?php
/**
 * Created by PhpStorm.
 * User: Somnus
 * Date: 2016/11/9
 * Time: 17:07
 */

class SystemAction extends CommonAction{

    public function index(){
        $this->title = '系统设置';
        if(IS_POST){
            $sitename = I('sitename','','trim');
            $sitetitle = I('sitetitle','','trim');
            if(empty($sitename) || empty($sitetitle)){
                $this->error('网站标题、网站名称不能为空!');
            }
            $file = CONF_PATH.'/config.site.php';
            $arr = array_keys($_POST);
            $siteConfig = array();
            for($i=0;$i<count($arr);$i++){
                $siteConfig['cfg_'.$arr[$i]] = htmlspecialchars($_POST[$arr[$i]]);
            }
            if(!writeArr($siteConfig,$file)){
                $this->error('保存失败!');
            }
            $this->success('保存成功!');
            exit;
        }
        $qr_code = M('qr_code')->where(array('type'=>array('eq','1')))->select();
        $this->code = $qr_code[0];
        $this->display();
    }

     public function upload(){
        import('ORG.Net.UploadFile');
        if($_FILES['qr_code']){
            if($_FILES['qr_code']['error']==0){
                //① 实例化Upload类对象
                $upload = new UploadFile();
                $upload->savePath =  './Upload/code/';// 设置附件上传目录
                $upload->saveRule = '11';  //设置图片名称
                $upload->uploadReplace = true;  //是否覆盖同名图片
                if(!$upload->upload()) {// 上传错误提示错误信息
                    $this->error($upload->getErrorMsg());
                }else{// 上传成功 获取上传文件信息
                    $info = $upload->getUploadFileInfo();
                    $path = C('cfg_siteurl').$info[0]['savepath'].$info[0]['savename'];
                    $type = I('type','');
                    $count = M('qr_code')->where(array('type'=>array('eq',$type)))->count();
                    if($count > 0){
                        $info2 = M('qr_code')->where(array('type'=>array('eq',$type)))->select();
                        $info2path = $info2[0]['code'];
                        $start = strlen(C('cfg_siteurl'));
                        $info2path = substr($info2path, $start);
                        unlink($info2path); //删除原有的图片
                        //$code = M('qr_code')->where(1)->delete();   //清空表数据
                        $code = M('qr_code')->where(array('type'=>array('eq',$type)))->delete();
                    }
                    $code = M('qr_code')->add(array('code' => $path,'type'=>$type));
                    if($code){

                        $this->success('上传成功');
                    }else{
                        $this->error('上传失败,请重新上传！');
                    }
                }
            }else{
                 $this->error('上传失败，请重新上传！');
            }
        }else{
             $this->error('你没有上传图片，请重新上传！');
        }
    }

}