import java.io.*;
import java.net.*;

class SocketProgram 
{
	public static void main(String[] args) {
		
		BufferedReader in = null;
		try
		{
			Runtime r = Runtime.getRuntime();
			Process P = r.exec("Ping 127.0.0.1");
			if(P == null)
			{
				System.out.println("Could not connect.");
			}

			in = new BufferedReader(new InputStreamReader(P.getInputStream()));

			String line;
			while(line=in.readLine() != null )
			{
				if(line.startsWith("Reply"))
				{
					System.out.println("There's a reply!");
				} else if (line.startsWith("Request")) {
					System.out.println("There's a Request line.")
				} else if (line.startsWith("Destination")) {
					System.out.println("Destination Host Unreachable.");
				}
			}

			in.close(); 
		}
		catch (IOException io)
		{
			System.err.println(io.toString());
		}
	}
}