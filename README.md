# chuanglan
创蓝SMS开发组件 for hyperf


安装组件:

	composer require firstphp/chuanglan



发布配置:

    php bin/hyperf.php vendor:publish firstphp/chuanglan



编辑.env配置：

	SMS_URL=http://222.73.117.158/
	SMS_ACCOUNT=username
	SMS_PWD=password



示例代码：

	use Hyperf\Di\Annotation\Inject;
    use Firstphp\Chuanglan\ChuanglanInterface;

    ......

    /**
     * @Inject
     * @var ChuanglanInterface
     */
    protected $chuanglan;

    public function test() {
        $res = $this->chuanglan->sendSms(158xxxx3175, '23489');
        var_dump($res);
    }
