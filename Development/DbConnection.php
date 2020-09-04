class DbConnection
{
    protected $conn = null;
    public function OpenCon()
    {
        $this->conn = new mysqli('localhost','ironxpxj_admin' , '!@#123qweasdzxc', 'ironxpxj_edu') or die($conn->connect_error);
        return $this->conn;
    }
    public function CloseCon()
    {
        $this->conn->close();
    }
}