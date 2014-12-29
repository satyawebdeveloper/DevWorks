import java.io.IOException;
import java.io.PrintWriter;
  
import javax.servlet.GenericServlet;
import javax.servlet.ServletRequest;
import javax.servlet.ServletResponse;
  
public class AdditionServlet extends GenericServlet {
  
    public void service(ServletRequest request, ServletResponse response)
            throws IOException {
  
        String number1 = request.getParameter("n1");
        String number2 = request.getParameter("n2");
  
        int n1 = Integer.parseInt(number1);
        int n2 = Integer.parseInt(number2);
  
        int sum = n1 + n2;
  
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
  
        out.println("<html>");
        out.println("<body>");
        out.println("<h1> Sum=" + sum + "</h1>");
        out.println("</body><html>");
  
        out.close();
  
    }
}