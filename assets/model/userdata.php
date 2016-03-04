<?php
/**
 * @author Yosin Hasan
 * User: developer
 * Date: 16.01.16
 * Time: 12:50
 * @version: 0.0.1
 */
class UserData extends AbstractModel
{
    private $table = "userdata";
   
    public function __construct()
    {
        parent::__construct($this->table);
        $this->addField("ip_address", "");
        $this->addField("user_agent", "");
        $this->addField("view_date", "");
        $this->addField("page_url", "");
        $this->addField("views_count", "");
    }
    /**
     * Processing and saving data to db.
     * 
     */
    public final function handle()
    {
        $field = ["id"];
        $ipAddress = $this->get_client_ip();
        $pageUrl = $this->page_url;
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $where = "`ip_address` = ? AND `page_url` = ? AND `user_agent` = ?";
        $data = UserData::getOnWhere("userdata",$field,$where, [$ipAddress,$pageUrl,$userAgent]);
        if ($data) {
             $id = (int) $data[0]['id'];
             $this->load($id);
             $this->view_date = date("Y-m-d H:i:s");
             $this->views_count +=1;
             $this->save();
             return true;
        } else {
            $this->ip_address = $ipAddress;
            $this->user_agent = $userAgent;
            $this->view_date = date("Y-m-d H:i:s");
            $this->page_url = $pageUrl;
            $this->views_count = 1;
            $this->save();
            if ($this->checkIsSaved()) {
                return true;
            } 
        }
        return  false;
    }
    /**
     * Function to get the client IP address.
     * 
     * @return $ipaddress
     */ 
    private function get_client_ip()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP')) {
           $ipaddress = getenv('HTTP_CLIENT_IP');
        } elseif(getenv('HTTP_X_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        } elseif(getenv('HTTP_X_FORWARDED')) {
            $ipaddress = getenv('HTTP_X_FORWARDED');
        } else if(getenv('HTTP_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        } else if(getenv('HTTP_FORWARDED')) {
            $ipaddress = getenv('HTTP_FORWARDED');
        } else if(getenv('REMOTE_ADDR')) {
            $ipaddress = getenv('REMOTE_ADDR');
        } else {
            $ipaddress = 'UNKNOWN';
        }
        return $ipaddress;
    }


}
