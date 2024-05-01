using System;
using static System.Console;
namespace ConsoleApp3
{
	class pattern1
	{
		public static void Main(String[] args)
		{  
           int i, j, count = 1, number=5; 
           count = number - 1;  
           for (j = 1; j <= number; j++)  
           {  
               for (i = 1; i <= count; i++)  
                   Console.Write(" ");  
               count--;  
               for (i = 1; i <= 2 * j - 1; i++)  
                   Console.Write(count);  
               Console.WriteLine();  
           }  
           count = 1;  
           for (j = 1; j <= number - 1; j++)  
           {  
               for (i = 1; i <= count; i++)  
                   Console.Write(" ");  
               count++;  
               for (i = 1; i <= 2 * (number - j) - 1; i++)  
                   Console.Write(count);  
               Console.WriteLine();  
           }  
           Console.ReadLine();  
		}
	}
}