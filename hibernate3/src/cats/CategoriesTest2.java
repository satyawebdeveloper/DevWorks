package cats;
import java.util.Iterator;
import java.util.List;

import org.hibernate.Query;
import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.Transaction;
import org.hibernate.cfg.Configuration;

public class CategoriesTest2 {
	public static void main(String[] args) {

		Configuration cfg = new Configuration();
		cfg.configure("hibernate.cfg.xml");

		SessionFactory factory = cfg.buildSessionFactory();
		Session session = factory.openSession();
		
		String hql = "INSERT INTO Categories (CategoryName) values ('xcvbxcvb')";
		Query query = session.createQuery(hql);
		int result = query.executeUpdate();
		System.out.println("Rows affected: " + result);
		
		
		
		session.flush();
		session.close();
		factory.close();
	}
}
