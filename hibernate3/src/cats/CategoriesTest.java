package cats;
import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.Transaction;
import org.hibernate.cfg.Configuration;

public class CategoriesTest {
	public static void main(String[] args) {

		Configuration cfg = new Configuration();
		cfg.configure("hibernate.cfg.xml");

		SessionFactory factory = cfg.buildSessionFactory();
		Session session = factory.openSession();
		Categories obj = new Categories();
		obj.setCategoryName("Cat2");
	
		Transaction tx = session.beginTransaction();
		session.save(obj);
		System.out.println("Object saved successfully.....!!");
		tx.commit();
		
		session.flush();
		session.close();
		factory.close();
	}
}
