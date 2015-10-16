<?php

/**
 *    支付方式管理控制器
 *
 *    @author    Garbin
 *    @usage    none
 */
class PaymentApp extends BackendApp
{
    function index()
    {
        /* 读取已安装的支付方式 */
        $model_payment =& m('payment');
        $payments      = $model_payment->get_builtin();
        $white_list    = $model_payment->get_white_list();
        foreach ($payments as $key => $value)
        {
            $payments[$key]['system_enabled'] = in_array($key, $white_list);
        }
        $this->assign('payments', $payments);
        $this->display('payment.index.html');
    }

    /**
     *    启用
     *
     *    @author    Garbin
     *    @return    void
     */
    function enable()
    {
        $code = isset($_GET['code'])    ? trim($_GET['code']) : 0;
        if (!$code)
        {
            $this->show_warning('no_such_payment');

            return;
        }
        $model_payment =& m('payment');
        if (!$model_payment->enable_builtin($code))
        {
            $this->show_warning($model_payment->get_error());

            return;
        }
        $data = array(
            'enabled' => 1,
        );
        $model_payment->edit("payment_code='{$code}'", $data);
        $this->show_message('enable_payment_successed');

    }

    /**
     *    禁用
     *
     *    @author    Garbin
     *    @return    void
     */
    function disable()
    {
        $code = isset($_GET['code'])    ? trim($_GET['code']) : 0;
        if (!$code)
        {
            $this->show_warning('no_such_payment');

            return;
        }
        $model_payment =& m('payment');
        if (!$model_payment->disable_builtin($code))
        {
            $this->show_warning($model_payment->get_error());

            return;
        }
        $data = array(
            'enabled' => 0,
        );
        $model_payment->edit("payment_code='{$code}'", $data);
        $this->show_message('disable_payment_successed');
    }
    
    /**
     * 支付配置
     */
    public function edit(){
        $model_payment = &m('payment');
        $code = isset($_GET['code']) ? trim($_GET['code']) : 0;
        $code=str_replace(array("/","\\"), '', $code);
        if (!$code){
            $this->show_warning('没有指定需要配置的支付方式');
            return;
        }
        $payment = $model_payment->get_builtin_info($code);
        if (!$payment){
            $this->show_warning('没有指定需要配置的支付方式');
            return;
        }
        $payment_info  = $model_payment->get("payment_code='{$code}' AND payment_id=1 AND store_id=1");
        if(IS_POST){
            $data = array(
                'store_id'      => 1, //默认为1
                'payment_name'  => $payment['name'],
                'payment_code'  => $code,
                'payment_desc'  => $_POST['payment_desc'],
                'config'        => $_POST['config'],
                'is_online'     => $payment['is_online'],
                'enabled'       => $_POST['enabled'],
                'sort_order'    => $_POST['sort_order'],
            );
            if($payment_info){ //已存在，进行修改
                $return = $model_payment->edit("payment_code='{$code}' AND payment_id=1 AND store_id=1", $data);
            }else{ //不存在，进行写入
                $return = $model_payment->install($data);
            }
            //支付是否启用
            if($_POST['enabled']){//启用
                $model_payment->enable_builtin($code);
            } else { //禁用
                $model_payment->disable_builtin($code);
            }
            $this->show_message('编辑成功', '返回支付管理', 'index.php?app=payment', '继续编辑', 'index.php?app=payment&act=edit&code='.$code);
        }else{
            $payment['payment_id']  =   $payment_info['payment_id'];
            $payment['payment_desc']=   $payment_info['payment_desc'];
            $payment['enabled']     =   $payment_info['enabled'];
            $payment['sort_order']  =   $payment_info['sort_order'];
            $this->assign('config', unserialize($payment_info['config']));
            $this->assign('payment', $payment);
            $this->display('payment.edit.html');
        }
    }
}

?>