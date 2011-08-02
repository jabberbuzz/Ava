<h2>Database</h2>
<p>
   Database class is using <a href="http://www.php.net/manual/en/pdo.installation.php" target="_blank">PDO</a> library. So, pdo extension should be enable in php.ini.
</p>

<h3>Config Database</h3>

    <p>You can reduce your database code in ava framework. First, you need to change database host, username, password and database name.</p>
    <p>Setup in /system/config/config.php</p>
    <pre class="brush:php">
        //Database setup
        const db_host="localhost";
        const db_name="avaframework_sample";
        const db_user="root";
        const db_password="root";
    </pre>

<a name="load"></a><h3>Load DB Class</h3>
    <p>You can load databaes class like following</p>
    <pre class="brush:php">
        $this->load->library("db");
    </pre>
    
<a name="get"></a><h3>Get Data</h3>

    <p>If you want to get the data from <code class="variable">foo</code> table , you can write like following.</p>

    <pre class="brush:php">
        //select * from foo
        $result=$this->db->get('foo');
        print_r($result); // print all result
        echo $result[0]->field; // field is a field name of table
    </pre>

    <code class="variable">$result</code> is a array.

<a name="select"></a><h3>Select Field</h3>

     <pre class="brush:php">
        //select `id` from foo
        $this->db->select('id');
        $result=$this->db->get('foo');
        print_r($result); // print all result
        echo $result[0]->id;
    </pre>

    <p>You can also make multi select like this</p>

    <pre class="brush:php">
        //select `id`,`name` from foo
        $this->db->select('id,name');
        $result=$this->db->get('foo');
        print_r($result); // print all result
        echo $result[0]->id;
    </pre>

<a name="whereequal"></a><h3>Where Equal</h3>

    <pre class="brush:php">
        //select * from foo where id = 1
        $this->db->where("id",1);
        $result=$this->db->get('foo');
    </pre>

<a name="wherenotequal"></a><h3>Where Not Equal</h3>

    <pre class="brush:php">
        //select * from foo where id !=1
        $this->db->where("id",1,false);
        $result=$this->db->get('foo');
    </pre>

<a name="whereand"></a><h3>Where With AND</h3>

    <pre class="brush:php">
        //select * from foo where id = 1 and name='foo'
        $this->db->where("id",1);
        $this->db->where("name","foo");
        $result=$this->db->get('foo');
    </pre>

    <pre class="brush:php">
        //select * from foo where id = 1 and name!='foo'
        $this->db->where("id",1);
        $this->db->where("name","foo",false);
        $result=$this->db->get('foo');
    </pre>

<a name="whereor"></a><h3>Where With OR</h3>

    <pre class="brush:php">
        //select * from foo where id = 1 or name='foo'
        $this->db->where("id",1);
        $this->db->where_or("name","foo");
        $result=$this->db->get('foo');
    </pre>

    <pre class="brush:php">
        //select * from foo where id = 1 or name!='foo'
        $this->db->where("id",1);
        $this->db->where_or("name","foo",false);
        $result=$this->db->get('foo');
    </pre>

<a name="wherelike"></a><h3>Where With AND Like</h3>


    <pre class="brush:php">
        //select * from foo where `id` =1 and `name` like '%foo%'
        $this->db->where('id','1');
        $this->db->where_like("name",'foo');
        $result=$this->db->get('foo');
    </pre>

    <pre class="brush:php">
        //select * from foo where `id` =1 and `name` like 'foo%'
        $this->db->where('id','1');
        $this->db->where_like("name",'foo','after');
        $result=$this->db->get('foo');
    </pre>

    <pre class="brush:php">
        //select * from foo where `id` =1 and `name` like '%foo'
        $this->db->where('id','1');
        $this->db->where_like("name",'foo','before');
        $result=$this->db->get('foo');
    </pre>

<a name="whereorlike"></a><h3>Where With OR Like</h3>

    <pre class="brush:php">
        //select * from foo where `id` =1 OR `name` like '%foo%'
        $this->db->where('id','1');
        $this->db->where_or_like("name",'foo');
        $result=$this->db->get('foo');
    </pre>

    <pre class="brush:php">
        //select * from foo where `id` =1 OR `name` like 'foo%'
        $this->db->where('id','1');
        $this->db->where_or_like("name",'foo','after');
        $result=$this->db->get('foo');
    </pre>

    <pre class="brush:php">
        //select * from foo where `id` =1 OR `name` like '%foo'
        $this->db->where('id','1');
        $this->db->where_or_like("name",'foo','before');
        $result=$this->db->get('foo');
    </pre>

<a name="order"></a><h3>Order</h3>
    
    <pre class="brush:php">
        //select * from foo where id = 1 ORDER BY `name` ASC'

        $order['name']='ASC';
        $this->db->where("id",1);
        $this->db->order($order);
        $result=$this->db->get('foo');
    </pre>

    <pre class="brush:php">
        //select * from foo where id = 1 ORDER BY `name` ASC' , `type DESC

        $order['name']='ASC';
        $order['type']='DESC';
        $this->db->where("id",1);
        $this->db->order($order);
        $result=$this->db->get('foo');
    </pre>
<a name="limit"></a><h3>Limit</h3>
    $this->db->limit(TOTAL,[START = 0])
    <pre class="brush:php">
        //select * from foo where id = 1 ORDER BY `name` ASC' , `type DESC

        $order['name']='ASC';
        $order['type']='DESC';
        $this->db->where("id",1);
        $this->db->order($order);
         $this->db->limit(4);
        //$this->db->limit(4,5); start from 5
        $result=$this->db->get('foo');
      </pre>
    
<a name="oneline"></a><h3>One Line</h3>
    <pre class="brush:php">
        $result= $this->db->selec('foo')->where("id",1)->get('table');
    </pre>
    
<a name="insert"></a><h3>Insert</h3>
    <pre class="brush:php">
        $data['name']="foo";
        $data['field']="bar";
        $this->db->insert($data,"table");
    </pre>

<a name="update"></a><h3>Update</h3>
    <pre class="brush:php">
        $data['name']='bar';
        $data['field']='foo';
        $this->db->where("id",4);
        $this->db->update($data,"table");
    </pre>

<a name="delete"></a><h3>Delete</h3>
    <pre class="brush:php">
        $this->db->where("id",4);
        $this->db->delete("table");
    </pre>