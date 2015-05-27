// file: ProfileScript.cs
using UnityEngine;
 
public class ProfileScript : MonoBehaviour
{
	void Awake() {
		Profile.StartProfile("Game");		
	}
	
	private void Start(){
		Profile.StartProfile("Start");		
		int answer = 2 + 2;
		print("2 + 2 = " + answer);
		Profile.EndProfile("Start");		
	}
 
	private void OnApplicationQuit() {
		Profile.EndProfile("Game");
		Profile.PrintResults();
	}
}