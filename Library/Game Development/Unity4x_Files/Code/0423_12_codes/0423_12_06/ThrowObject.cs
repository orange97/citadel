using UnityEngine;
using System.Collections;

public class ThrowObject : MonoBehaviour {
	public GameObject projectile;
	public Vector3 projectileOffset;
	public Vector3 projectileForce;
	public Transform character;
	public Transform charactersHand;
	
	public void Prepare () {
		projectile = Instantiate(projectile, charactersHand.position, charactersHand.rotation) as GameObject;
		if(projectile.GetComponent<Rigidbody>())
			Destroy(projectile.rigidbody);
		
		projectile.GetComponent<SphereCollider>().enabled = false;		
		projectile.name = "projectile";
		projectile.transform.parent = charactersHand;
		projectile.transform.localPosition = projectileOffset;
		projectile.transform.localEulerAngles = Vector3.zero;		
	}	
	public void Throw () {		
		projectile.transform.rotation = character.rotation;
		projectile.transform.parent = null;		
		projectile.GetComponent<SphereCollider>().enabled = true;		
		projectile.AddComponent<Rigidbody>();
		projectile.rigidbody.AddRelativeForce(projectileForce);	
	}
}
