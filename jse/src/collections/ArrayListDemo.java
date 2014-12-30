package collections;

import java.util.ArrayList;
import java.util.Iterator;

public class ArrayListDemo {
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		ArrayList list= new ArrayList();
		list.add("a");
		list.add("b");
		
		System.out.println(list); //[a, b]
		Iterator iter=list.iterator();
		while(iter.hasNext()){  
			   System.out.println(iter.next());  
		}  
	}
}



