package cats;
import java.util.List;

import org.hibernate.Query;
import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.Transaction;
import org.hibernate.cfg.Configuration;

public class CategoriesTest1 {
	public static void main(String[] args) {

		Configuration cfg = new Configuration();
		cfg.configure("hibernate.cfg.xml");

		SessionFactory factory = cfg.buildSessionFactory();
		Session session = factory.openSession();
		
		String hql = "FROM Categories";
		Query query = session.createQuery(hql);
		List results = query.list();
		
		System.out.println(results);
		
		session.flush();
		session.close();
		factory.close();
	}
}
