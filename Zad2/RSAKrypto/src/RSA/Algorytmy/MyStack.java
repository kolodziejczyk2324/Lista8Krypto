package RSA.Algorytmy;

import java.math.BigInteger;

public class MyStack {

	/**
	 * Elementy na stosie.
	 * @author Kemer
	 */
	private class Node{
		public Node prev; //poprzedni element na stosie
		public BigInteger value; //wartosc elementu
	}
	
	Node top = null;
	
	public void push(BigInteger new_value){
		Node new_node = new Node();
		new_node.value = new_value;
		new_node.prev = top;
		top = new_node;
	}
	
	public BigInteger pop(){
		if(top == null) return null;
		BigInteger ret_value = top.value;
		top = top.prev;
		return ret_value;
	}
	
}
