// file: Player.cs
using UnityEngine;
using System.Collections;

public class Player : MonoBehaviour {
	public static string username = null;
	public static int score = -1;
	
	public static void DeleteAll(){
		username = null;
		score = -1;
	}
}
