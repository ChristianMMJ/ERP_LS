<?php

/**
 * Description of JasperCommand
 *
 * @author Y700
 */
class JasperCommand {

    //put your code here
    private $dbname = "lobo_solo";
    private $dbuser = "root";
    private $dbpassword = "";
    private $dbtype = "mysql";
    private $ip = "127.0.0.1";
    private $dbport = "3306";
    private $jasperurlsoftware = 'application\third_party\JasperPHP\src\JasperStarter\bin\jasperstarter.exe';
    private $jasperurl;
    private $folder;
    private $filename;
    private $documentformat;
    private $parametros;

    function getParametros() {
        return $this->parametros;
    }

    function setParametros($parametros) {
        $this->parametros = $parametros;
    }

    function getDbname() {
        return $this->dbname;
    }

    function getDbuser() {
        return $this->dbuser;
    }

    function getDbpassword() {
        return $this->dbpassword;
    }

    function getDbtype() {
        return $this->dbtype;
    }

    function getIp() {
        return $this->ip;
    }

    function getDbport() {
        return $this->dbport;
    }

    function getJasperurlsoftware() {
        return $this->jasperurlsoftware;
    }

    function getJasperurl() {
        return $this->jasperurl;
    }

    function getFolder() {
        return $this->folder;
    }

    function getFilename() {
        return $this->filename;
    }

    function getDocumentformat() {
        return $this->documentformat;
    }

    function setDbname($dbname) {
        $this->dbname = $dbname;
    }

    function setDbuser($dbuser) {
        $this->dbuser = $dbuser;
    }

    function setDbpassword($dbpassword) {
        $this->dbpassword = $dbpassword;
    }

    function setDbtype($dbtype) {
        $this->dbtype = $dbtype;
    }

    function setIp($ip) {
        $this->ip = $ip;
    }

    function setDbport($dbport) {
        $this->dbport = $dbport;
    }

    function setJasperurlsoftware($jasperurlsoftware) {
        $this->jasperurlsoftware = $jasperurlsoftware;
    }

    function setJasperurl($jasperurl) {
        $this->jasperurl = $jasperurl;
    }

    function setFolder($folder) {
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }
        if (delete_files($folder)) {
            
        }
        $this->folder = $folder;
    }

    function setFilename($filename) {
        $this->filename = $filename;
    }

    function setDocumentformat($documentformat) {
        $this->documentformat = $documentformat;
    }

    public function getReport() {
        try {
            $parametros_finales = "";
            if (count($this->getParametros()) > 0) {
                $parametros_finales .= " -P";
                foreach ($this->getParametros() as $key => $value) {
                    if (is_string($value)) {
                        $parametros_finales .= " $key=\"$value\"";
                    } else {
                        $parametros_finales .= " $key=$value";
                    }
                }
            }
            $cmd = "{$this->getJasperurlsoftware()} pr {$this->getJasperurl()} -o {$this->getFolder()}/{$this->getFilename()} {$parametros_finales} -f {$this->getDocumentformat()} -t {$this->getDbtype()} -H {$this->getIp()} -u {$this->getDbuser()} -n {$this->getDbname()} --db-port {$this->getDbport()}";
            $command_esc = escapeshellcmd($cmd);
            passthru($command_esc);
            return base_url("{$this->getFolder()}/{$this->getFilename()}.{$this->getDocumentformat()}");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
