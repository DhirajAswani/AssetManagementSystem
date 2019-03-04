class Node implements Comparable{
    public int compareTo(T obj){return 1;}
}

class Test{
    public static void main(String[] args){
        Node nc=new Node<>();
        Comparable com=nc;
}
}