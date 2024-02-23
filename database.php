<?php
$server="localhost";
$dbuser="root";
$dbpass="";
$dbname="CrimeRecordSystem";
$x=0;
mysql_connect($server,$dbuser,$dbpass) or die(mysql_error());
if(mysql_select_db($dbname))
$x=1;
else
$x=2;
if($x==2)
{	
mysql_query("create database CrimeRecordSystem") or die(mysql_error());
		echo "<br>Your Database is Successfully created";
}
			else if($x==1)
			{ 
				//create employee table
			mysql_query("create table employee(emp_id varchar(50) primary key,firstname varchar(50),fathername varchar(50),gfathername varchar(50),
			sex varchar(50),age int,phoneno int,educationlevel varchar(50),
			officeno int,email varchar(50),status varchar(50),photo varchar(50),status2 varchar(50))") or die(mysql_error());
			echo "<br> employee table is successfully created";

			
			//create Account table
			mysql_query("create table account(userid varchar(50) primary key,username varchar(50),password varchar(50),role varchar(50),
			status varchar(20), FOREIGN key(userid) REFERENCES employee(emp_id)) ") or die(mysql_error());
			echo "<br> Account table is successfully created";
			
			
			
			//create criminal table
			mysql_query("create table criminal(criminal_id varchar(50) primary key,firstname varchar(50),fathername varchar(50),gfathername varchar(50)				,sex varchar(50),age int,phoneno int,village varchar(50),kebele varchar(50),educationlevel varchar(50),job varchar(50),photo varchar(50))") 			or die(mysql_error());
			echo "<br> criminal table is successfully created";
			
			//create criminal case table
			mysql_query("create table criminalcase(criminalcase_id int AUTO_INCREMENT primary key,criminal_id varchar(50),crimetype varchar(50),
			crimelevel varchar(50),kebele varchar(50),
			village varchar(50),date date,description text,photo varchar(50),FOREIGN key(criminal_id) REFERENCES criminal(criminal_id))")
			or die(mysql_error());
			echo "<br> crime table is successfully created";
			
			//create comment table
			mysql_query("create table comment(Comment_id int AUTO_INCREMENT PRIMARY KEY,firstname varchar(50) ,fathername varchar(50),
			date date,email varchar(50),status varchar(50),description text )") or die(mysql_error());
			echo "<br> comment table is successfully created";
					
			//create accident table
			mysql_query("create table accident(accident_id varchar(50) primary key,Vehicle_owner_firstname varchar(50),
			Vehicle_owner_fathername varchar(50),Vehicle_owner_gfathername  varchar(50),driver_license_no varchar(50),crime_commited_date date,
			crime_type varchar(50),crime_level varchar(50),panishment_type varchar(50),panishment_amount varchar(50))") or die(mysql_error());
			echo "<br> accident table is successfully created";
			
			//create complainAccount table
			mysql_query("create table Registercomplaint(complaint_id varchar(50) primary key,firstname varchar(50),fathername varchar(50),
			gfathername varchar(50),sex varchar(50),age int,phoneno int,educationlevel  varchar(50),job varchar(50),
			workplace varchar(50),kebele varchar(50),status varchar(50),email varchar(50),photo varchar(50),description text)")
			 or die(mysql_error());
			echo "<br> complain table is successfully created";
			
			//create accountrequest table
			mysql_query("create table accountrequest(Request_id int primary key AUTO_INCREMENT,police_id varchar(50),complaint_id  varchar(50)
			,description text,date date,status  varchar(50),status2  varchar(50),FOREIGN key(Police_id) REFERENCES employee(emp_id))")
			 or die(mysql_error());
			echo "<br> accountrequest table is successfully created";
			
			//create responsecomplaintaccount table
			mysql_query("create table responsecomplaintaccount(Response_id int primary key AUTO_INCREMENT,
			adminstrator_id varchar(50),police_id varchar(50),username  varchar(50),password varchar(50),date date,status  varchar(50))")
			 or die(mysql_error());
			echo "<br> responsecomplaintaccount table is successfully created";
			
			//create complain table
			mysql_query("create table complain1(complain_id varchar(50) primary key,firstname varchar(50),fathername varchar(50),			    
			gfathername  varchar(50),sex varchar(50),city varchar(50),kebele varchar(50),village varchar(50),date date,description text)")
			 or die(mysql_error());
			echo "<br> complain table is successfully created";
							
			//create nomination table
			mysql_query("create table nomination(No_Id int AUTO_INCREMENT,firstname varchar(50),fathername varchar(50),types varchar(50),kebele 
			varchar(50),village varchar(50),date date,description text,status varchar(50))") or die(mysql_error());
			echo "<br> nomination table is successfully created";
						//create nomination table
			mysql_query("create table trafficnomination(TrNo_Id int AUTO_INCREMENT,firstname varchar(50),fathername varchar(50),types varchar(50),
			kebele varchar(50),street varchar(50),date date,photo varchar(50),description text,status varchar(50))") or die(mysql_error());
			echo "<br> nomination table is successfully created";	
			
			//create accuser table
			mysql_query("create table accuser(accuser_id varchar(50) primary key,firstname varchar(50),fathername varchar(50),
			gfathername varchar(50),sex varchar(50),age int,phoneno int,educationlevel varchar(50),email varchar(50),status varchar(50)
			,kebele varchar(50),village varchar(50),date date,
			photo varchar(50),description text)") 
			or die(mysql_error());
			echo "<br> accuser table is successfully created";
			
			//create accused table
			mysql_query("create table accused(accused_id varchar(50) primary key,firstname varchar(50),fathername varchar(50),
			gfathername varchar(50),sex varchar(50),age int,phoneno int,educationlevel varchar(50),email varchar(50),status varchar(50)
			,kebele varchar(50),village varchar(50),date date,photo varchar(50),description text)")or die(mysql_error());
			echo "<br> accused table is successfully created";	
			
			//create witness table
			mysql_query("create table witness(witness_id varchar(50) primary key,accuser_id varchar(50),firstname varchar(50),fathername varchar(50),
			gfathername varchar(50),sex varchar(50),age int,phoneno int,educationlevel varchar(50),email varchar(50),status varchar(50),
			kebele varchar(50),village varchar(50),date date,
			photo varchar(50),description text,FOREIGN key(accuser_id) REFERENCES accuser(accuser_id))")or die(mysql_error());
			echo "<br> witness table is successfully created";	
			
			//create firstinformationreport table
			mysql_query("create table firstinformationreport(FIR_ID int AUTO_INCREMENT primary key,accuser_id varchar(50),accused_id varchar(50),
			witness_id varchar(50),photo varchar(50),description text,FOREIGN key(accuser_id) REFERENCES accuser(accuser_id), 
			FOREIGN key(accused_id) REFERENCES accused(accused_id), FOREIGN key(witness_id) REFERENCES witness(witness_id))")or die(mysql_error());
			echo "<br> firstinformationreport table is successfully created";
		
			//create placement table
			mysql_query("create table placement(placement_No varchar(50) primary key,Police_id varchar(50),firstname varchar(50),
			fathername varchar(50),gfathername varchar(50),sex varchar(50),phoneno int,kebele varchar(50),date date,status varchar(50),
			FOREIGN key(Police_id) REFERENCES employee(emp_id))") 
			or die(mysql_error());
			echo "<br> placement table is successfully created";
			
			//create trafficplacement table
			mysql_query("create table trafficplacement(Trafficpolice_id varchar(50) primary key,firstname varchar(50),
			fathername varchar(50),gfathername varchar(50),sex varchar(50),phoneno int,kebele varchar(50),street varchar(50),start_date date,
			end_date date),status varchar(50),FOREIGN key(Trafficpolice_id) REFERENCES account(userid))")
			or die(mysql_error());
			echo "<br> trafficplacement table is successfully created";	
			
			//create order table
			mysql_query("create table orders(order_id varchar(50) primary key,accuser_id varchar(50),userid varchar(50),accused_firstname varchar(50),
			accused_fathername varchar(50),accused_gfathername varchar(50),sex varchar(50),kebele varchar(50),village varchar(50),
			Crime_commited_dates date,appointment_dates varchar(50),description text,status varchar(50),FOREIGN key(userid) REFERENCES account(userid),
			FOREIGN key(accuser_id)REFERENCES accuser(accuser_id))") or die(mysql_error());
			echo "<br> order table is successfully created";
			
			//create accountrequest table 
			mysql_query("create table accountrequest(Request_id varchar(50) primary key,police_id varchar(50),complaint_id varchar(50),
			description text,FOREIGN key(police_id) REFERENCES account(userid),
			FOREIGN key(complaint_id)REFERENCES Registercomplaint(complaint_id))") or die(mysql_error());
			echo "<br> accountrequest table is successfully created";
			
		   //create accountresponse table accountresponse
			mysql_query("create table accountresponse(respons_id varchar(50) primary key,Adminstrator_id varchar(50),police_id varchar(50),
			username varchar(50),password varchar(50),date date,status varchar(50),FOREIGN key(police_id) REFERENCES employee(emp_id),
			FOREIGN key(Adminstrator_id)REFERENCES employee(emp_id))") or die(mysql_error());
			echo "<br> accountresponse table is successfully created";
			
			//create accountresponse table accountresponse file,sdate,exdate
			mysql_query("create table MisssingPerson(MP_Id int AUTO_INCREMENT primary key,firstname varchar(50),fathername varchar(50),
			sex varchar(50),age int,posting_type varchar(50), wereda varchar(50),kebele varchar(50),lostdate date,
			postdate date,photopath varchar(50),description text)") or die(mysql_error());
			echo "<br> accountresponse table is successfully created";
			
			//create nominationmissingperson table accountresponse file,sdate,exdate
			mysql_query("create table nominationmissingperson(NMP int AUTO_INCREMENT primary key,zone varchar(50),woreda varchar(50),
			kebele varchar(50),village varchar(50),date date,status varchar(50), description text)") or die(mysql_error());
			echo "<br> nominationmissingperson table is successfully created";
			
			mysql_query("create table logfiletable( lig_id  int  PRIMARY key AUTO_INCREMENT,userid  varchar(50),username VARCHAR(50),role VARCHAR(50),
			login_time  VARCHAR(50),logout_time  VARCHAR(50), start_time VARCHAR(50), activity_type VARCHAR(50),activity_performed VARCHAR(2000),
			ip_address VARCHAR(50),date date)") or die(mysql_error());
			echo "<br>logtable table created  ";
			
			mysql_query("create table Notice( Notice_id  int  PRIMARY key AUTO_INCREMENT,title  varchar(50),Sender VARCHAR(50),post_date datetime,
			Exp_date  datetime,file  LONGTEXT)") or die(mysql_error());
			echo "<br>logtable table created  ";
			
			mysql_query("create table complainrequest( complaint_id varchar(50) PRIMARY key,firstname  varchar(50),fathername VARCHAR(50),
			gfathername VARCHAR(50),complaintype  VARCHAR(50),description  text,FOREIGN key(complaint_id)REFERENCES registercomplaint(complaint_id))");
			echo "<br>logtable table created  ";
			
			}
			?>