CREATE talbe GUEST{
	num NUMBER PRIMARY KEY,
	name VARCHAR(20) NOT NULL,
	create DATE DEFAULT SYSDATE,
	content VARCHAR2(4000) NOT NULL,
	ipAddr VARCHAR2(50)
}

public class GuestDTO{
	private int num;
}