<?php
	$token = isset($token) ? $token : htmlentities($_GET['token'],ENT_QUOTES);
	/**
 	* 包含SDK
 	*/
	require("../classes/yb-globals.inc.php");
	// 配置文件
	require_once 'config.php';
	$api = YBOpenApi::getInstance()->init($config['AppID'], $config['AppSecret'], $config['CallBack']);
	$api->bind($token);
	$stu=new Student($api);
    $check=$stu->checkOrder();
    if($check['status']=='success'){
        $url = "browseorderinfo.php?token=".$token;
    ?>
   <script language='javascript' type='text/javascript'>window.location.href='<?=$url?>'</script>
   <?php
    }
?>
        <!DOCTYPE html>
        <html>
            
            <head style="background-color:#FFFAFA">
                <meta charset="utf-8">
                <meta content="width=device-width,user-scalable=no" name="viewport">
                <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js">
                </script>
                <script type="text/javascript" src="../js/navigator.js">
                </script>
                <script src="https://res.wx.qq.com/open/libs/weuijs/1.0.0/weui.min.js">
                </script>
                <link rel="stylesheet" type="text/css" href="../style/dist/style/weui.css">
                <link rel="stylesheet" type="text/css" href="../style/dist/example/example.css">
                <title style="color:black">
                    预订被服
                </title>
                <script type="text/javascript">
                    var prices=new Array(60,50,30,40,20,10);//依次为三件套价格，被子价格，褥子价格，床垫价格，马扎价格，枕头价格
                    var flag=new Array(0,0,0,0,0,0);
                    var cost=60;//迷彩服价格
                    function updatecost(){
                        document.getElementById("cost").innerText = "共"+cost+"元";
                    }
                	function Load(){
                        updatecost();
                		document.getElementById('bedding').addEventListener('click',function(){
                            if(flag[0]==0){
                                cost+=prices[0];
                                flag[0]=1;
                            }
                            else{
                                flag[0]=0;
                                cost-=prices[0];
                            }
                          updatecost();
                		});
                        document.getElementById('quilt').addEventListener('click',function(){
                          if(flag[1]==0){
                                cost+=prices[1];
                                flag[1]=1;
                          }
                            else{
                                flag[1]=0;
                                cost-=prices[1];
                            }
                          updatecost();
                        });
                        document.getElementById('puff').addEventListener('click',function(){
                          if(flag[2]==0){
                                cost+=prices[2];
                                flag[2]=1;
                          }
                            else{
                                flag[2]=0;
                                cost-=prices[2];
                            }
                          updatecost();
                        });
                        document.getElementById('mattress').addEventListener('click',function(){
                          if(flag[3]==0){
                                cost+=prices[3];
                                flag[3]=1;
                          }
                            else{
                                flag[3]=0;
                                cost-=prices[3];
                            }
                          updatecost();
                        });
                        document.getElementById('stool').addEventListener('click',function(){
                          if(flag[4]==0){
                                cost+=prices[4];
                                flag[4]=1;
                          }
                            else{
                                flag[4]=0;
                                cost-=prices[4];
                            }
                          updatecost();
                        });
                        document.getElementById('pillow').addEventListener('click',function(){
                          if(flag[5]==0){
                                cost+=prices[5];
                                flag[5]=1;
                          }
                            else{
                                flag[5]=0;
                                cost-=prices[5];
                            }
                          updatecost();
                        });
                	}
                </script>
            </head>
            
            <body style="background-color:#FFFAFA;width:100%;" onload="Load()">
            		<header>
                    <h3 style="vertical-align: middle;text-align:center;font-size:30px;margin-top: 20px; ">
                        <a>
                            新生被服预定订单
                        </a>
                    </h3>
                </header>
                <form method="post" action="update.php?token=<?=$token?>"
                id="form">
                <div class="weui-cells__title" style="display: -webkit-flex;display: flex;"><div class="weui-cells__title">宿舍用品选择</div></div>
                    		<div class="weui-cells weui-cells_checkbox">
                            <label class="weui-cell weui-check__label" >
                                <div class="weui-cell__hd">
                                    <input type="checkbox" id="bedding" name="bedding" class="weui-check" />
                                    <i class="weui-icon-checked">
                                    </i>
                                </div>
                                <div class="weui-cell__bd">
                                    <p>
                                        床上三件套
                                    </p>
                                </div>
                            </label>
                            <label class="weui-cell weui-check__label" >
                                <div class="weui-cell__hd">
                                    <input type="checkbox" id="quilt" name="quilt" class="weui-check" />
                                    <i class="weui-icon-checked">
                                    </i>
                                </div>
                                <div class="weui-cell__bd">
                                    <p>
                                        被子
                                    </p>
                                </div>
                            </label>
                            <label class="weui-cell weui-check__label" >
                                <div class="weui-cell__hd">
                                    <input type="checkbox" id="puff" name="puff" class="weui-check" />
                                    <i class="weui-icon-checked">
                                    </i>
                                </div>
                                <div class="weui-cell__bd">
                                    <p>
                                        褥子
                                    </p>
                                </div>
                            </label>
                            <label class="weui-cell weui-check__label" >
                                <div class="weui-cell__hd">
                                    <input type="checkbox" id="mattress" name="mattress" class="weui-check" />
                                    <i class="weui-icon-checked">
                                    </i>
                                </div>
                                <div class="weui-cell__bd">
                                    <p>
                                        床垫
                                    </p>
                                </div>
                            </label>
                            <label class="weui-cell weui-check__label" >
                                <div class="weui-cell__hd">
                                    <input type="checkbox" id="pillow" name="pillow" class="weui-check" />
                                    <i class="weui-icon-checked">
                                    </i>
                                </div>
                                <div class="weui-cell__bd">
                                    <p>
                                        枕头
                                    </p>
                                </div>
                            </label>
                        </div>
                        <div class="weui-cells__title" style="display: -webkit-flex;display: flex;"><div class="weui-cells__title">军训用品选择</div></div>
                        <div class="weui-cells weui-cells_checkbox">
                            <label class="weui-cell weui-check__label" >
                                <div class="weui-cell__hd">
                                    <input type="checkbox" class="weui-check" checked="checked" disabled="disabled" />
                                    <i class="weui-icon-checked">
                                    </i>
                                </div>
                                <div class="weui-cell__bd">
                                    <p>
                                        军训服
                                    </p>
                                </div>
                            </label>
                            <label class="weui-cell weui-check__label" >
                                <div class="weui-cell__hd">
                                    <input type="checkbox" id="stool" name="stool" class="weui-check" />
                                    <i class="weui-icon-checked">
                                    </i>
                                </div>
                                <div class="weui-cell__bd">
                                    <p>
                                        马扎
                                    </p>
                                </div>
                            </label>
                        </div>
                    <div class="weui-cells__title">军训服尺码选择</div>
                    <div class="weui-cells">
                    	<div class="weui-cell weui-cell_select weui-cell_select-after">
                        <div class="weui-cell__hd">
                            <label for="" class="weui-label">
                                尺码
                            </label>
                        </div>
                        <div class="weui-cell__bd">
                            <select class="weui-select" name="size">
                                <option value="150">
                                    150
                                </option>
                                <option value="155">
                                    155
                                </option>
                                <option value="160">
                                    160
                                </option>
                                <option value="165">
                                    165
                                </option>
                                <option value="170">
                                    170
                                </option>
                                <option value="175">
                                    175
                                </option>
                                <option value="180">
                                    180
                                </option>
                                <option value="185">
                                    185
                                </option>
                                <option value="190">
                                    190
                                </option>
                                <option value="195">
                                    195
                                </option>
                            </select>
                        </div>
                    </div>
                    </div>
                    <br>
                    <div class="weui-cells__title">备注</div>
                    <div class="weui-cells">
                    	<div class="weui-cell">
                            <div class="weui-cell__bd">
                                <textarea class="weui-textarea" id="comment" name="comment" placeholder="请输入文本" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="weui-form-preview__ft" style="z-index:777;width:100%;position:fixed;bottom:0%;">
                        <a class="weui-form-preview__btn weui-form-preview__btn_primary" style="background-color:#FF8000;flex-grow: 2;vertical-align: middle;"><div id="cost" style="color:white;"></div></a>
                        <button type="submit" style="color:white;background-color: #01A5ED;flex-grow: 1;vertical-align: middle;" class="weui-form-preview__btn weui-form-preview__btn_primary">预订</button>
                    </div>
                    
                </form>
            </body>
        
        </html>